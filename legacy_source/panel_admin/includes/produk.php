<div>
    <?php
    if(!isset($_GET['subtarget'])) {
        ?>
    <h2>Daftar Produk</h2>
    <a href="<?= base_url("panel_admin/?target=produk&subtarget=add") ?>" type="button" class="btn btn-primary btn-sm">Tambah Produk</a>
    <div class="mt-3" style="max-width: 1190px;display: grid;gap: 16px;grid-template-columns: repeat(3, 1fr);">
        <?php
        $get = query("product","ORDER BY id DESC");
        while($dp = mysqli_fetch_array($get)) {
            ?>
            <div style="border: 1px solid #EFEFEF;border-radius: 5px;overflow: hidden;">
                <img src="<?= base_url("assets/image/product/").$dp['photo'] ?>" class="img-fluid mb-1" style="object-fit: cover;aspect-ratio: 16/9;" />
                <div class="d-flex justify-content-between" style="padding: 10px 16px;">
                    <span style="font-weight: bold;"><?= $dp['title'] ?></span>
                    <div class="d-flex" style="gap: 10px;">
                        <a href="<?= base_url("panel_admin/?target=produk&subtarget=edit&produk_id=".$dp['id']) ?>">Edit</a>
                        <a class="hapus_produk" style="cursor: pointer;color: #007BFF;" data-id_produk="<?= $dp['id'] ?>">Delete</a>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <script>
            $(".hapus_produk").on("click", function(){
                var target_id = $(this).data("id_produk");
                if(confirm("Apakah Anda yakin ingin menghapus produk ini?")) {
                    $.ajax({
                        url: "<?= base_url("panel_admin/endpoint/index.php?target=crud/produk/delete") ?>",
                        type: "POST",
                        data: {"id_produk":target_id},
                        success:function(data){
                            console.log(data);
                            var response = JSON.parse(data);
                            if(response.success == true) {
                                window.location.reload();
                            } else {
                                alert("Gagal menghapus produk");
                            }
                        },
                        error:function(data){}
                    });                    
                }
            });
        </script>
    </div>
        <?php
    } else {
        $st = $_GET['subtarget'];
        switch($st){
            case "add":
                require("produk/add.php");
                break;
            case "edit":
                require("produk/edit.php");
                break;
            default:
                break;
        }
    } ?>
</div>