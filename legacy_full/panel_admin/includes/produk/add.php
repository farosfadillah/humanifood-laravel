<h2>Tambah Produk</h2>
<div class="mt-3" style="max-width: 576px;">
    <form method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="hargapkg" class="col-sm-4 col-form-label">Harga /pkg</label>
            <div class="col-sm-4">
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                    <input type="text" class="form-control" name="price" placeholder="~" />
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
            <div class="col-sm-8">
                <input type="text" name="title" class="form-control" id="nama_produk" />
            </div>
        </div>
        <div class="row mb-3">
            <label for="minimumorder" class="col-sm-4 col-form-label">Minimum Pembelian</label>
            <div class="col-sm-2">
                <input type="number" name="minimumorder" class="form-control text-center" id="minimumorder" value="25" />
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
            <textarea name="detail" id="detail"></textarea>
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
                $.ajax({
                    url: "<?= base_url("panel_admin/endpoint/index.php?target=crud/produk/add") ?>",
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
</div>