<?php
if(isset($_POST['text']) && isset($_POST['order_id']) && $user['role'] == "admin") {
    $orid = $_POST['order_id'];
    $text = base64_encode($_POST['text']);
    $insert = insert("chat","sender='1', order_id='$orid', text='$text', timestamp='$timestamp'");
    if($insert) {
        $response['success'] = true;
        $getNc = query("chat","WHERE order_id='$orid'");
        $update = "";
        while($cd = mysqli_fetch_array($getNc)) {
            if($cd['sender'] == "0") {$sender = "Pembeli";}
            if($cd['sender'] == "1") {$sender = "Admin";}
            $update = $update."<div class='row mb-3'><label class='col-sm-2 col-form-label'><b>".$sender."</b></label><div class='col-sm-10'><label class='form-check-label border-bottom'>".base64_decode($cd['text'])."</label></div></div>";
        }
        $response['update'] = $update;
    } else {
        $response['message'] = "Gagal mengirimkan pesan.";
    }
}
?>