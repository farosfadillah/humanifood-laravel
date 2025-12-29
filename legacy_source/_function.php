<?php
session_start();
$db_host = getenv('DB_HOST') ?: getenv('MYSQL_HOST') ?: '127.0.0.1';
$db_user = getenv('DB_USERNAME') ?: getenv('MYSQL_USER') ?: 'root';
$db_pass = getenv('DB_PASSWORD') ?: getenv('MYSQL_PASSWORD') ?: '';
$db_name = getenv('DB_DATABASE') ?: 'humanifood_laravel';
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if($conn) { // kalau koneksi ke database berhasil
    
    $timestamp = $_SERVER['REQUEST_TIME']; // timestamp untuk mendapatkan unix time

    $upload = array( // aturan untuk format upload file yang diizinkan dan size maksimum nya
        "image" => array(
            "allowed" => array("jpg","png","webp","svg"),
            "maxsize" => 1000000
        ),
        "audio" => array(
            "allowed" => array("mp3","wav"),
            "maxsize" => 1000000
        ),
        "video" => array(
            "allowed" => array("mp4","3gp","mkv"),
            "maxsize" => 1000000
        )
    );

    $site = array( // data-data website
        "title" => "Humanifood",
        "slogan" => "Eat Healthy Think Better",
        "description" => "",
        "base_url" => (getenv('APP_URL') ? rtrim(getenv('APP_URL'), '/') . '/' : "http://localhost/humanifood/"),
    );

    // function untuk menampilkan link (base_url+direktori)
    function base_url($__dir) {
        global $site;
        return $site['base_url'].$__dir;
    }

    // function untuk mengambil alamat direktori setelah base_url
    function getSlug($slug) {
        $slug = explode("/",$slug);
        $slug = $slug[0];
        return $slug;
    }

    // base_url("{target}");
    // getSlug("{target}");

    // function untuk cek apakah sudah login
    function is_loggedIn(){
        global $_SESSION;
        if(isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }        
    }

    // function copy, jika file dengan nama yang sama tidak ditemukan: upload
    function file_copy($file,$target) {
        if(!file_exists($target)) {
            copy($file,$target);
        }
    }

    // function delete, jika file dengan nama yang sama ditemukan: hapus
    function file_delete($target) {
        if(file_exists($target)) {
            unlink($target);
        }
    }

    // function buat direktori, jika direktori dengan nama yang sama tidak ditemukan: buat
    function folder_create($target) {
        if(!file_exists($target)) {
            mkdir($target);
        }        
    }

    // function hapus direktori, jika direktori dengan nama yang sama ditemukan: hapus
    function folder_delete($target) {
        if(file_exists($target)) {
            rmdir($target);
        }
    }

    // function upload supaya lebih aman, 3 parameter: tipe, sumber dan target direktorinya
    function upload($type, $source, $target) {
        global $upload; // mengambil data allowed file extension dan maxsize
        if(!file_exists($target)) { // jika file dengan nama yang sama tidak ada di direktori target
            $exs = strtolower(pathinfo($source['name'], PATHINFO_EXTENSION)); // ambil extension dari file yang diupload (dari $source)
            if(in_array($exs, $upload[$type]['allowed'])) { // jika ekstensi tersebut ada di dalam array allowed extension (dari $upload[])
                if(move_uploaded_file($source['tmp_name'],$target)) { // pindahkan file dari $source ke $target
                    return true; // jika berhasil upload / move_uploaded file, maka return true
                } else {
                    return false; // jika gagal upload / move_uploaded file, maka return false
                }
            } else {
                return false; // jika extension tidak ada di dalam allowed ext di $upload, maka return false
            }
        } else {
            return false; // jika file dengan nama yang sama di direktori target ada, return false;
        }
    }

    // file_copy("{target}");
    // file_delete("{target}");
    // folder_create("{target}");
    // folder_delete("{target}");

    // SQL
    function sqlify($array) { // function untuk mengubah array menjadi kolom target dan value, menggunakan foreach
        global $timestamp;
        $parts = "";
        foreach ($array as $key => $value) {
            $parts = $parts.$key."='".$value."', ";
        }
        $parts = $parts."updated='$timestamp'";
        return $parts;

        /*
        $filter = array(
            "name" => "Ibnu Gans",
            "email" => "ibnugans@gmail.com"
        );

        sqlify($filter);

        return: "name"="Ibnu Gans", "email"=>"ibnugans@gmail.com"

        note: function ini tidak bisa digunakan pada select query
        */
    }

    function query($table, $filter) { // function untuk melakukan 'search' query, untuk mendapatkan data
        global $conn; // import variabel $conn
        return mysqli_query($conn, "SELECT * FROM $table $filter");
        // $table adalah nama table yang ditarget
        // $filter adalah paramater "pencocokan"
    }

    function select($table, $filter) {
        global $conn; // import variabel $conn
        return mysqli_query($conn, "SELECT * FROM $table WHERE $filter");
        // $table adalah nama table yang ditarget
        // $filter adalah paramater "pencocokan"
    }

    function insert($table, $new) {
        global $conn; // import variabel $conn
        return mysqli_query($conn, "INSERT INTO $table SET $new");
        // $table adalah nama table yang ditarget
        // $new adalah data-data yang mau diinput, menggunakan function sqlify($new) lebih efisien
    }

    function update($table, $new, $filter) {
        global $conn; // import variabel $conn
        return mysqli_query($conn, "UPDATE $table SET $new WHERE $filter");
        // $table adalah nama table yang ditarget
        // $new adalah data-data baru, menggunakan function sqlify($new) lebih efisien
        // $filter adalah parameteri "pencocokan", menggunakan function sqlify($new) lebih efisien
    }

    function delete($table, $filter) {
        global $conn; // import variabel $conn
        return mysqli_query($conn, "DELETE FROM $table WHERE $filter");
    }

    // query("{table}","{filter}");
    // insert("{table}",sqlify($insert));
    // update("{table}",sqlify($update),"{filter}");
    // delete("{table}","{filter}");

    // Security
    function enc911($password) {
        $password = md5("salt".$password."salt");
        return $password;
    }

    // enc911({password});

    function navbar() { // function untuk include navbar
        global $site;
        global $_SESSION;
        global $user;
        require("includes/navbar.php");
    }

    function footer() { // function untuk include footer
        global $site;
        global $pageTitle;
        require("includes/footer.php");
    }
    
    // additional
    $user = array();
    if(isset($_SESSION['_userid'])) {
        $uid = $_SESSION['_userid'];
        $get = select("user","id='$uid'");
        if(mysqli_num_rows($get) == 1) {
            $user = mysqli_fetch_array($get);
        } else {
            session_destroy();
            header("Location: ".base_url(""));
        }
    }

    // function untuk tombol otentikasi yang ditampilkan di menu
    function accountmenu(){
        global $_SESSION;
        if(!isset($_SESSION['_userid'])) {
            $code = "<a href='".base_url("masuk")."'>MASUK</a>";
        } else {
            $code = "<a href='".base_url("keluar")."'>KELUAR</a>";
        }
        return $code;
    }
} else {
    exit();
}
?>