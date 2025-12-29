<?php
if(isset($confirm)) {
    $fn = base64_encode($_POST['fullName']);
    $em = base64_encode($_POST['email']);
    $sj = base64_encode($_POST['subject']);
    $ms = base64_encode($_POST['message']);
    
    $insert = insert("contact","submitted='$timestamp', fullname='$fn', email='$em', subject='$sj', message='$ms'");
    if($insert) {
        $response['success'] = true;
    }
}
?>