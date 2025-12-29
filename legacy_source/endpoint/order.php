<?php
if(isset($confirm)) {
    if(isset($_SESSION['_userid']) && $user['role'] == "user") {
        $ui = $user['id'];
        $nl = base64_encode($_POST['nama_lengkap']);
        $nh = base64_encode($_POST['nomor_handphone']);
        $ad = base64_encode($_POST['alamat']);
        $od = base64_encode($_POST['request_date']);
        $ct = base64_encode($_POST['catatan']);
        $pi = $_POST['product_id'];
        $qy = $_POST['qty'];
        $tc = $_POST['total_cost'];

        // $bp = $_FILES['paymentProve'];
        // $ext = pathinfo($bp['name'], PATHINFO_EXTENSION);
        // $fileName = md5($timestamp.$bp['name']);
        // $pfn = $fileName.".".$ext;
        // $upload = upload("image",$bp,"../assets/image/bp/".$pfn);
        // if($upload) {
            // $insert = insert("orders","user_id='$ui', product_id='$pi', name='$nl', phone='$nh', address='$ad', order_date='$od', note='$ct', total_cost='$tc', payment='$pfn', status='0', ordered='$timestamp'");
        // } else {
        //     $response['message'] = "Gagal upload bukti pembayaran.";
        // }
        
        $insert = insert("orders","user_id='$ui', product_id='$pi', name='$nl', phone='$nh', address='$ad', order_date='$od', note='$ct', total_cost='$tc', status='0', ordered='$timestamp'");
        if($insert) {
            $response['success'] = true;
        } else {
            $response['message'] = "Gagal insert data pesanan";
        }
    }
}
?>