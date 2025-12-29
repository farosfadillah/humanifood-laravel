<?php
require("../_function.php");
$confirm = true;
$response = array();
$response['post'] = $_POST;
$response['file'] = $_FILES;
if(isset($_GET['target'])) {
    if(file_exists($_GET['target'].".php")) {
        require($_GET['target'].".php");
    } else {
        
    }
}
echo json_encode($response);
?>