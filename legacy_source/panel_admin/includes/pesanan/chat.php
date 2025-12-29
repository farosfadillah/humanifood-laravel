<h2>Chat Pesanan</h2>
<div class="mt-3" style="max-width: 576px;">
<div class="chatFull">
    <?php
        if(isset($_GET['order_id'])) {
            $oi = $_GET['order_id'];
            $get = query("chat","WHERE order_id='$oi' ORDER BY id ASC");
            if(mysqli_num_rows($get) > 0) {
                while($data = mysqli_fetch_array($get)) {
                    if($data['sender'] == 0) {$sender = "Pembeli";}
                    if($data['sender'] == 1) {$sender = "Admin";}
                    ?>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"><b><?= $sender ?></b></label>
                        <div class="col-sm-10">
                            <label class="form-check-label border-bottom"><?= base64_decode($data['text']) ?></label>
                        </div>
                    </div>
                    <?php
                }
            }
        }
    ?>
</div>
<form method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="col-10">
            <textarea name="text" class="form-control shadow-none"></textarea>
        </div>
        <div class="col-2 d-flex">
            <input type="button" class="form-control shadow-none btn btn-primary btn-lg" value="KIRIM" />
        </div>
    </div>
</form>
<script>
    $("form input[type='button']").on("click", function(){
        var form = $("form")[0],
            formData = new FormData(form);
        formData.append("order_id",<?= $_GET['order_id'] ?>);
        $.ajax({
            url: "<?= base_url("panel_admin/endpoint/index.php?target=send") ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success:function(data){
                console.log(data);
                var response = JSON.parse(data);
                if(response.success == true) {
                    $(".chatFull").html(response.update);
                    $("textarea[name='text']").val("");
                } else {
                    
                }
            },
            error:function(data){
                
            }
        });
    });
</script>