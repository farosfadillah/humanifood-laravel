<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // serve legacy index by default
    return app()->call([App\Http\Controllers\LegacyController::class, 'serve'], ['path' => '']);
});

// Catch-all route to serve legacy pages from legacy_source
Route::any('/{any}', [App\Http\Controllers\LegacyController::class, 'serve'])->where('any', '.*');
