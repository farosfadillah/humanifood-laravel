<?php
if(isset($_POST['produk_id'])) {
    $pid   = $_POST['produk_id'];
    $check = select("product","id='$pid'");
    if(mysqli_num_rows($check) == 1) {
        $data  = mysqli_fetch_array($check);
        $price = $_POST['price'];
        $title = $_POST['title'];
        $miner = $_POST['minimumorder'];
        $detil = base64_encode($_POST['detail']);
        
        $slug  = strtolower(str_replace(" ","-",$title));
        
        $query = update("product","slug='$slug', title='$title', content='$detil', hpp='$price', minimum='$miner'","id='$pid'");
        if($query) {
            $response['success'] = true;
        }
    
        if($_FILES['image']['size'] > 0) {
            $photo = $_FILES['image'];
            $ext       = pathinfo($photo['name'], PATHINFO_EXTENSION);
            $fileTitle = md5($photo['name'].$timestamp).".".$ext;
            $upload    = upload("image",$photo,"../../assets/image/product/".$fileTitle);
            if($upload) {
                $query = update("product","photo='$fileTitle'","id='$pid'");
                if($query) {
                    $response['success'] = true;
                    unlink("../../assets/image/product/".$data['photo']);
                }
            }
        }
    }
}
?>