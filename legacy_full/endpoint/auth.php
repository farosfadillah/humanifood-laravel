<?php
if(isset($confirm)) {
    if(isset($_POST['username']) && isset($_POST['password'])) {
        $u = $_POST['username'];
        $p = $_POST['password'];

        $check = select("user","username='$u' AND password='$p'");
        if(mysqli_num_rows($check) == 1) {
            $data = mysqli_fetch_array($check);
            $response['success'] = true;
            $_SESSION['_userid'] = $data['id'];
        } else {
            $response['success'] = false;
            $response['message'] = "Login tidak valid";
        }
    }
}
?>