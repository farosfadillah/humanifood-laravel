<?php
if(isset($confirm)) {
    $fn = $_POST['fullname'];
    $un = $_POST['username'];
    $ph = $_POST['phone'];
    $pw = $_POST['password'];
    
    $cu = query("user","WHERE username='$un'");
    if(mysqli_num_rows($cu) == 0) {
        $cp = query("user","WHERE nomor_handphone='$ph'");
        if(mysqli_num_rows($cp) == 0) {
            $insert = insert("user","username='$un', password='$pw', name='$fn', nomor_handphone='$ph', role='user'");
            if($insert) {
                $get = select("user","username='$un'");
                if(mysqli_num_rows($get) == 1) {
                    $ud = mysqli_fetch_array($get);
                    $_SESSION['_userid'] = $ud['id'];
                    $response['success'] = true;
                } else {
                    $response['sucess'] = false;
                }
            } else {
                $response['message'] = "Gagal menyimpan data user";
            }
        } else {
            $response['message'] = "Nomor Handphone telah digunakan";
        }
    } else {
        $response['message'] = "Username telah digunakan";
    }
}
?>