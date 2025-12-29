<?php
require("_function.php");                       // include/require file di folder yang sama yang bernama _function.php 
if(!isset($_SESSION['_userid'])) {              // jika tidak ada $_SESSION dengan nama user_id
    require("includes/head.php");               // include/require file di folder includes yang bernama head.php
    navbar();
    if(isset($_GET['target'])) {                // jika tersedia parameter GET:target (dari RewriteUrl di .htaccess)
        switch($_GET['target']) {
            case "in":                              // jika value dari parameter GET:target adalah "in"
                require("page/auth/login.php");     // buka file di folder page/auth yang bernama login.php
                break;
            case "up":                              // tetapi jika value dari parameter GET:target adalah "up"
                require("page/auth/regist.php");    // buka file di folder page/auth yang bernama login.php
                break;
            case "reset":
                require("page/auth/reset.php");
                break;
        }
    }
    footer();
} else {                                        // jika ditemukan $_SESSION dengan nama user_id
    if(isset($_GET['target'])) {
        if($_GET['target'] == "logout") {       // jika $_GET['target'] adalah "logout"
            session_destroy();                  // hapus session _userid (atau semua session lain yang tersimpan)
            header("Location: ".base_url(""));  // alihkan ke halaman utama
        }
    } else {
        header("Location: ".base_url(""));          // alihkan ke base_url
    }
}
?>