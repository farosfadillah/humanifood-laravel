<div class="row g-5 py-5">
    <div class="text-center">
        <img class="d-block mx-auto mb-4" src="<?= base_url("assets/image/icon-192x192.png") ?>" alt="" width="72">
        <h2>Informasi Pesanan Anda: #<?= $_GET['order_id'] ?></h2>
        <p class="text-center">Berikut adalah informasi yang Kami terima:</p>
    </div>
</div>
<div class="mt-1 mb-5">
<?php
    if(isset($_GET['order_id'])) {
        $oi = $_GET['order_id'];
        $get = select("orders","id='$oi' AND user_id='$ui'");
        if(mysqli_num_rows($get) == 1) {
            $data = mysqli_fetch_array($get);
            ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Penerima</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="<?= $users[$data['user_id']]['name'] ?> / <?= base64_decode($data['phone']) ?>" disabled/>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Produk yang dipesan</label>
                    <div class="col-sm-8">
                        <label class="col-form-label border-bottom"><a href="<?= base_url("produk/".$product[$data['product_id']]['slug']) ?>" target="_blank"><?= $product[$data['product_id']]['title'] ?></a></label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Alamat Pengiriman</label>
                    <div class="col-sm-8">
                        <label class="col-form-label border-bottom"><?= base64_decode($data['address']) ?></label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Waktu Pemesanan</label>
                    <div class="col-sm-8">
                        <label class="col-form-label border-bottom"><?= base64_decode($data['order_date']) ?></label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Catatan Khusus</label>
                    <div class="col-sm-8">
                        <label class="col-form-label border-bottom"><?= base64_decode($data['note']) ?></label>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Status</label>
                    <div class="col-sm-8">
                        <?php
                            switch($data['status']) {
                                case 0:
                                    $status = "Sedang Ditinjau";
                                    break;
                                case 1:
                                    if($data['payment'] == "") {
                                        $status = "Order Diterima (Harap melakukan pembayaran & upload bukti pembayaran uang muka)";
                                    } else {
                                        $status = "Order Diterima (Bukti Transfer segera kami verifikasi)";
                                    }
                                    break;
                                case 2:
                                    $status = "Order Diterima | Pembayaran Dikonfirmasi.";
                                    break;
                                case 3:
                                    $status = "Order Ditolak";
                                    break;
                                case 4:
                                    $status = "Order Diterima | Pembayaran Tidak Valid";
                                    break;
                            }
                        ?>
                        <label class="col-form-label border-bottom" style="display: inline-block;background: rgba(65, 217, 116, .2);padding: 2.5px 10px;border-radius: 5px;"><?= $status ?></label>
                    </div>
                </div>
                <?php if($data['payment'] != "") { ?>
                <div class="row mb-3">
                    <label for="nama_produk" class="col-sm-4 col-form-label">Bukti Pembayaran</label>
                    <div class="col sm-8"><a href="<?= base_url("assets/image/bp/").$data['payment'] ?>" target="_blank" class="btn btn-primary">Lihat Disini</a></div>
                </div>
                <?php } else { ?>
                <?php
                if($data['status'] == 1) {
                    ?>
                <div class="row mb-3">
                    <label class="col-sm-4 col-form-label">Upload Bukti Pembayaran</label>
                    <div class="col-sm-8 d-flex justify-content-between" style="gap: 10px;">
                        <input type="file" class="form-control" name="bukti_transfer" />
                        <input type="button" class="btn btn-primary" value="Upload" />
                    </div>
                </div>
                    <?php
                }
                ?>                
                <?php } ?>
                <a href="<?= base_url("myOrder?subtarget=chat&order_id=").$_GET['order_id'] ?>" type="button" target="_blank" class="btn btn-outline-primary">Hubungi Admin Terkait Order Ini</a>
            </form>
            <script>
                $("form input[type='button']").on("click", function(){
                    var form = $("form")[0],
                        formData = new FormData(form);
                    formData.append("trid","<?= $_GET['order_id'] ?>");
                    $.ajax({
                        url: "<?= base_url("endpoint/index.php?target=upload_bukti_transfer") ?>",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success:function(data){
                            console.log(data);
                            var response = JSON.parse(data);
                            if(response.success == true) {
                                window.location.reload();
                            } else {
                                $("p#message_placer").hide();
                                $("p#message_placer").html("Gagal menyimpan pesanan.");
                                $("p#message_placer").fadeIn();
                            }
                        },
                        error:function(data){
                            
                        }
                    });
                });
            </script>
            <?php
        }
    }
?>
</div>