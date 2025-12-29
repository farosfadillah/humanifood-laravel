<?php
if(isset($_POST['order_id']) && isset($_POST['action'])) {
    $oi = $_POST['order_id'];
    switch($_POST['action']){
        case "accept":
            $q = update("orders","status='1'","id='$oi'");
            if($q) {$response['success'] = true;}
            break;
        case "reject":
            $q = update("orders","status='3'","id='$oi'");
            if($q) {$response['success'] = true;}
            break;
        case "accept_payment":
            $q = update("orders","status='2'","id='$oi'");
            if($q) {$response['success'] = true;}
            break;
        case "reject_payment":
            $q = update("orders","status='4'","id='$oi'");
            if($q) {$response['success'] = true;}
            break;
    }
}
?>