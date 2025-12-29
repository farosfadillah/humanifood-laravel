<?php
header('Content-type: text/javascript');

$endconfirm = true;
require("../../_function.php");
$response = array();
$response['posted'] = $_POST;
$response['posted']['files'] = $_FILES;
$response['success'] = false;
if(isset($_GET['target'])) {
    if(file_exists($_GET['target'].".php")) {
        require($_GET['target'].".php");
    } else {
        $response['msg'] = "Error endpoint, code: #000002";
    }
} else {
    $response['msg'] = "Error endpoint, code: #000001";
}
echo json_encode($response, JSON_PRETTY_PRINT);
?>