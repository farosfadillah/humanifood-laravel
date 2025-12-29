<?php
if(isset($_POST['id_produk'])) {
    $pid   = $_POST['id_produk'];
    $check = select("product","id='$pid'");
    if(mysqli_num_rows($check) == 1) {
        $data  = mysqli_fetch_array($check);
        $query = delete("product","id='$pid'");
        if($query) {
            $response['success'] = true;
            unlink("../../assets/image/product/".$data['photo']);
        }
    }
}
?>