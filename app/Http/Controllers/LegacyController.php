<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class LegacyController extends Controller
{
    public function serve(Request $request, $path = null)
    {
        $base = base_path('legacy_source');
        $candidates = [];
        $slug = $path ?: '';

        if ($slug === '' || $slug === '/') {
            $candidates[] = $base . DIRECTORY_SEPARATOR . 'index.php';
        } else {
            $candidates[] = $base . DIRECTORY_SEPARATOR . $slug . '.php';
            $candidates[] = $base . DIRECTORY_SEPARATOR . 'page' . DIRECTORY_SEPARATOR . $slug . '.php';
            $candidates[] = $base . DIRECTORY_SEPARATOR . $slug . DIRECTORY_SEPARATOR . 'index.php';
            $candidates[] = $base . DIRECTORY_SEPARATOR . 'page' . DIRECTORY_SEPARATOR . $slug . DIRECTORY_SEPARATOR . 'index.php';
            $candidates[] = $base . DIRECTORY_SEPARATOR . 'panel_admin' . DIRECTORY_SEPARATOR . $slug . '.php';
        }

        foreach ($candidates as $file) {
            if (file_exists($file)) {
                // run the legacy PHP inside legacy_source so relative includes work
                $cwd = getcwd();
                chdir($base);
                ob_start();
                // ensure server vars
                $_SERVER['REQUEST_URI'] = $request->getRequestUri();
                $_GET = $request->query();
                $_POST = $request->post();
                $_FILES = $request->files->all();
                try {
                    include $file;
                } catch (\Throwable $e) {
                    ob_end_clean();
                    chdir($cwd);
                    return Response::make('Legacy script error: '.$e->getMessage(), 500);
                }
                $content = ob_get_clean();
                chdir($cwd);
                return Response::make($content, 200);
            }
        }

        return abort(404);
    }
}
