<?php
$price = $_POST['price'];
$title = $_POST['title'];
$miner = $_POST['minimumorder'];
$detil = base64_encode($_POST['detail']);
$photo = $_FILES['image'];
$slug  = strtolower(str_replace(" ","-",$title));

$ext       = pathinfo($photo['name'], PATHINFO_EXTENSION);
$fileTitle = md5($photo['name'].$timestamp).".".$ext;
$upload    = upload("image",$photo,"../../assets/image/product/".$fileTitle);
if($upload) {
    $query = insert("product","slug='$slug', title='$title', photo='$fileTitle', content='$detil', hpp='$price', minimum='$miner'");
    if($query) { 
        $response['success'] = true;
    }
}
?>