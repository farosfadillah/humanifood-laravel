<h2>Detail: Pesan #<?= $_GET['contact_id'] ?> - Formulir Kontak</h2>
<div class="mt-3" style="max-width: 768px;">
<?php
$cid = $_GET['contact_id'];
$get = select("contact","id='$cid'");
if(mysqli_num_rows($get) == 1) {
    $odata = mysqli_fetch_array($get);
?>
    <form method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Nama Lengkap</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= base64_decode($odata['fullname']) ?>" disabled/>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Alamat Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= base64_decode($odata['email']) ?>" disabled/>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Subject</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="<?= base64_decode($odata['subject']) ?>" disabled/>
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-4 col-form-label">Pesan</label>
            <div class="col-sm-8">
                <textarea class="form-control shadow-none" rows="12" disabled><?= base64_decode($odata['message']) ?></textarea>
            </div>
        </div>
    </form>
</div>
<?php } ?>