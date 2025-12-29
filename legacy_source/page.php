<?php
require("_function.php");                       // include/require file di folder yang sama yang bernama _function.php 
require("includes/head.php");               // include/require file di folder includes yang bernama head.php
navbar();
?>
<style>
    h1.special {
        text-align: center;
        text-transform: uppercase;
        font-weight: bold;
        margin-bottom: 32px;
    }
    
    p {
        text-align: justify;
    }
</style>
<?php
if(isset($_GET['type'])) {
    $t = $_GET['type'];
    if($t == "product") {
        require("show/product.php");
    } elseif($t == "seller") {
        
    } elseif($t == "order") {
        require("includes/order.php");
    } elseif($t == "myOrder") {
        require("includes/myOrder.php");
    }
} else {
    if(isset($_GET['slug'])) {
        $slug = $_GET['slug'];
        if(file_exists("page/".$slug.".php")) {
            require("page/".$slug.".php");
        }
    }
}
footer();
?>