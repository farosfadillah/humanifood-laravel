<?php require("../_function.php"); if(isset($_SESSION['_userid']) && $user['role'] == "admin") { ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Panel Admin | <?= $site['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <link rel="shortcut icon" href="<?= base_url("assets/image/icon-32x32.png") ?>" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="plugins/jquery/jquery.min.js"></script>
    <style>
        .content-wrapper {background: #FFF;}
        .tc {text-align: center;}
        textarea {resize: none;}
    </style>
</head>
<?php
if(isset($_SESSION['_userid'])) {
   ?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
            require("includes/elements/_nav.php");
            require("includes/elements/_side.php");
        ?>
        <div class="content-wrapper">
            <section class="content mt-3">
                <div class="container-fluid">
                <?php
                    if(!isset($_GET['target'])) {
                        
                    } else {
                        $target = $_GET['target'];
                        if(file_exists("includes/".$target.".php")) {
                            require("includes/".$target.".php");
                        } else {
                            // require("includes/404.php");
                        }
                    }
                ?>
                </div>
            </section>
        </div>
        <?php require("includes/elements/_footer.php"); ?>
    </div>
    <!-- ./wrapper -->
    <?php if(isset($_GET['target'])) {
        $theGet_target = $_GET['target'];
    ?>
    <script>
        var get_target = "<?= $theGet_target ?>";
        $(`.nav-link[data-target=${get_target}]`).addClass("active");
    </script>
    <?php } else { ?>
    <script>
        $(`li.nav-item:first-child a.nav-link`).addClass("active");
    </script>
    <?php } ?>
    <?php if(isset($_GET['parent'])) { ?>
    <script>
        var get_parent = "<?= $_GET['parent'] ?>";
        $(`.nav-item[data-target=${get_parent}]`).addClass("menu-open");
    </script>
    <?php } ?>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>$.widget.bridge('uibutton', $.ui.button)</script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="plugins/sparklines/sparkline.js"></script>
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="dist/js/demo.js"></script>
</body>
   <?php
}
?>
</html>
<?php } ?>