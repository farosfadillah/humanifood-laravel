<h2>Edit Produk</h2>
<div class="mt-3" style="max-width: 576px;">
<?php
    $pid = $_GET['produk_id'];
    $get = select("product","id='$pid'");
    if(mysqli_num_rows($get) == 1) {
        $data = mysqli_fetch_array($get);
        ?>
    <form method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="hargapkg" class="col-sm-4 col-form-label">Harga /pkg</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" class="form-control" name="price" placeholder="~" value="<?= $data['hpp'] ?>" />
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
            <div class="col-sm-8">
                <input type="text" name="title" class="form-control" id="nama_produk" value="<?= $data['title'] ?>" />
            </div>
        </div>
        <div class="row mb-3">
            <label for="minimumorder" class="col-sm-4 col-form-label">Minimum Pembelian</label>
            <div class="col-sm-2">
                <input type="number" name="minimumorder" class="form-control text-center" id="minimumorder" value="<?= $data['minimum'] ?>" />
            </div>
            <label for="minimumorder" class="col-sm-6 col-form-label" style="font-weight: normal;">paket</label>
        </div>
        <div class="row mb-3">
            <label for="nama_produk" class="col-sm-4 col-form-label">Foto Produk</label>
            <div class="col-sm-8">
                <input type="file" name="image" class="form-control" style="border: 0px solid transparent;padding: 0px;border-radius: 0px solid transparent;" />
            </div>
        </div>
        <div class="row mb-3">
            <textarea name="detail" id="detail"><?= base64_decode($data['content']) ?></textarea>
        </div>
        <input type="button" class="btn btn-primary" value="Simpan" />
    </form>
    <script>
        $(document).ready(function(){
            $(function () {
                $("#detail").summernote();
            });
            

            $("input[type='button']").on("click", function(){
                var form = $("form")[0],
                    formData = new FormData(form);
                formData.append("produk_id",<?= $pid ?>);
                $.ajax({
                    url: "<?= base_url("panel_admin/endpoint/index.php?target=crud/produk/edit") ?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        console.log(data);
                        var response = JSON.parse(data);
                        if(response.success == true) {
                            window.location.replace("<?= base_url("panel_admin/?target=produk"); ?>");
                        } else {
                            
                        }
                    },
                    error:function(data){
                        
                    }
                });
            });
        });
    </script>
        <?php
    }
?>
</div>