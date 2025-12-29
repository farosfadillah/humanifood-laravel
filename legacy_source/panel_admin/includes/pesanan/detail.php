<h2>Detail Pesanan</h2>
<div class="mt-3" style="max-width: 576px;">
<?php
$pid = $_GET['order_id'];
$get = select("orders","id='$pid'");
if(mysqli_num_rows($get) == 1) {
    $odata = mysqli_fetch_array($get);
?>
    <form method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Nama Penerima</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= $users[$odata['user_id']]['name'] ." / ".base64_decode($odata['phone']) ?>" disabled/>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Nama Produk</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= $product[$odata['product_id']]['title'] ?>" disabled/>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Jumlah Order</label>
            <div class="col-sm-2">
                <input type="number" class="form-control text-center" id="minimumorder" value="<?= $odata['total_cost']/$product[$odata['product_id']]['price'] ?>" disabled/>
            </div>
            <label class="col-sm-6 col-form-label" style="font-weight: normal;">paket</label>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Alamat Pengiriman</label>
            <div class="col-sm-8">
                <textarea class="form-control shadow-none" disabled><?= base64_decode($odata['address']) ?></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Waktu Pemesanan</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= base64_decode($odata['order_date']) ?>" disabled/>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Catatan Tambahan</label>
            <div class="col-sm-8">
                <textarea class="form-control shadow-none" disabled><?= base64_decode($odata['note']) ?></textarea>
            </div>
        </div>
        <?php
            if($odata['status'] != 0 && $odata['payment'] != "") {
                ?>
                <div class="row mb-3">
                    <label for="nama_produk" class="col-sm-4 col-form-label">Bukti Pembayaran</label>
                    <div class="col-sm-8">
                        <a href="<?= base_url("assets/image/bp/").$odata['payment'] ?>" class="btn btn-primary" type="button" target="_blank">Lihat Disini</a>
                        <input type="button" class="btn btn-danger" id="reject" data-action="reject_payment" value="Tidak Valid" />
                        <input type="button" class="btn btn-success" id="accept" data-action="accept_payment" value="Valid" />
                    </div>
                </div>
                <?php
            }
        ?>
        <a href="<?= base_url("panel_admin?target=pesanan&subtarget=chat&order_id=").$pid ?>" type="button" class="btn btn-outline-primary" target="_blank">Hubungi Pemesan</a>
        <input type="button" class="btn btn-outline-danger" id="reject" data-action="reject" value="Tolak Order" />
        <input type="button" class="btn btn-outline-success" id="accept" data-action="accept" value="Terima Order" />
    </form>
    <script>
        $("#reject, #accept").on("click", function(){
            var orderid = <?= $_GET['order_id'] ?>,
                action = $(this).data("action");
            $.ajax({
                url: "<?= base_url("panel_admin/endpoint/index.php?target=orders/action") ?>",
                type: "POST",
                data: {"order_id":orderid,"action":action},
                success:function(data){
                    console.log(data);
                    var response = JSON.parse(data);
                    if(response.success == true) {
                        alert("Aksi berhasil");
                    } else {
                        alert("Aksi tidak berhasil");
                    }
                },
                error:function(data){}
            });                    
        });
    </script>
</div>
<?php } ?>