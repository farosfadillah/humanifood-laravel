<?php if(isset($_SESSION['_userid'])) { ?>
<div class="container" style="margin-top: 16px;">
    <?php
    $pid = $_GET['product_id'];
    $check = select("product","id='$pid'");
    if(mysqli_num_rows($check) == 1) {
        $product = mysqli_fetch_array($check);
        $total_harga = number_format(($_GET['quantity']*$product['hpp'])/2,0,',','.');
        ?>
        <div class="detailinfo">
            <main>
                <div class="row g-5 py-5">
                    <div class="text-center">
                        <img class="d-block mx-auto mb-4" src="<?= base_url("assets/image/icon-192x192.png") ?>" alt="" width="72">
                        <h2>Checkout Pesanan</h2>
                        <p class="lead text-center">Lengkapi isian berikut dengan informasi yang dibutuhkan dan sebenar-benarnya.</p>
                    </div>
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <div class="border rounded">
                            <img src="<?= base_url("assets/image/product/").$product['photo'] ?>" />
                            <div class="p-2 pt-3">
                                <div class="d-flex justify-content-between">
                                    <h6><?= $product['title'] ?></h6>
                                    <h6><?= $_GET['quantity'] ?> porsi</h6>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-3">
                            <h4>TOTAL DP</h4>
                            <h4>Rp. <?php echo $total_harga; ?></h4>
                        </div>
                    </div>
                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Lengkapi isian berikut</h4>
                        <form class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?= $user['name'] ?>" required>
                                </div>

                                <div class="col-sm-6">
                                <label for="phoneNumber" class="form-label">No Handphone</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="nomor_handphone" placeholder="Nomor Handphone" value="<?= $user['nomor_handphone'] ?>" required>
                                </div>

                                <div class="col-12">
                                    <label for="alamat" class="form-label">Alamat Pengantaran</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                                </div>

                                <div class="col-12">
                                    <label for="waktu_pemesananan" class="form-label">Waktu Pemesanan</label>
                                    <input type="datetime-local" class="form-control" id="waktu_pemesananan" name="request_date" />
                                </div>
                                
                                <div class="col-12">
                                    <label for="specialNote" class="form-label">Catatan Khusus</label>
                                    <textarea class="form-control" id="specialNote" name="catatan" required></textarea>
                                </div>
                            </div>

                            <!--<hr class="my-4">-->

                            <!--<h4 class="mb-3">Pembayaran</h4>-->
                            
                            <!--<p>Uang muka yang harus Anda bayar adalah Rp. <?= $total_harga ?>, kirimkan ke rekening:<br/><b>BCA. 9277318933</b> atas nama: <b>Humanifood Indonesia</b></p>-->

                            <!--<div class="row g-3">-->
                            <!--    <div class="col-12">-->
                            <!--        <label for="paymentProve" class="form-label">Silahkan upload bukti Pembayaran:</label>-->
                            <!--        <input type="file" name="paymentProve" class="form-control" id="paymentProve" />-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                            <!--<p class="mt-3">*Pelunasan dibayar ketika pesanan datang dan ditransfer ke rekening yang sama</p>-->

                            <hr class="my-4">
                            <p id="message_placer"></p>
                            <input class="w-100 btn btn-primary btn-lg" type="button" value="Kirim" />
                        </form>
                    </div>
                </div>
            </main>
        </div>
        <script>
            $("form input[type='button']").on("click", function(){
                var form = $("form")[0],
                    formData = new FormData(form);
                formData.append("product_id",<?= $_GET['product_id'] ?>);
                formData.append("qty",<?= $_GET['quantity'] ?>);
                formData.append("total_cost",<?= $_GET['quantity']*$product['hpp'] ?>);
                $.ajax({
                    url: "<?= base_url("endpoint/index.php?target=order") ?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        console.log(data);
                        var response = JSON.parse(data);
                        if(response.success == true) {
                            window.location.replace('<?= base_url("myOrder") ?>');
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
    ?>
</div>
<?php } else {
    $pid = $_GET['product_id'];
    $qty = $_GET['quantity'];
    $gto = base_url("masuk?next=".base64_encode("order?product_id=".$pid."&quantity=".$qty));
    ?>
    <script>window.location.replace("<?= $gto ?>");</script>
    <?php
} ?>