<?php
if(isset($confirm)) {
    if(isset($_POST['trid'])) {
        $idt = $_POST['trid'];
        if(isset($_SESSION['_userid']) && $user['role'] == "user") {
            $bp = $_FILES['bukti_transfer'];
            $ext = pathinfo($bp['name'], PATHINFO_EXTENSION);
            $fileName = md5($timestamp.$bp['name']);
            $pfn = $fileName.".".$ext;
            $upload = upload("image",$bp,"../assets/image/bp/".$pfn);
            if($upload) {
                $update = update("orders","payment='$pfn'","id='$idt'");
                if($update) {
                    $response['success'] = true;
                }
            } else {
                $response['message'] = "Gagal upload bukti pembayaran.";
            }
        }
    }
}
?>