<?php
if(isset($_POST['username']) && isset($_POST['pass'])) {
    $u = $_POST['username'];
    $p = md5($_POST['pass']);

    $check = select("user","username='$u' AND password='$p'");
    if(mysqli_num_rows($check) == 1) {
        $data = mysqli_fetch_array($check);
        $response['success'] = true;
        $_SESSION['user_id'] = $data['id'];
    }
}
?>