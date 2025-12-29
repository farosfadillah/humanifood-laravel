<style>
    table.table tbody tr:hover {
        background: #F0F0F0;
    }
</style>
<div>
    <?php if(!isset($_GET['subtarget'])) { ?>
    <h2>Daftar Pengisian Formulir Kontak</h2>
    <div class="mt-3" style="max-width: 1200px;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Dikirim</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Alamat Email</th>
                <th scope="col">Subject</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $getOrders = query("contact","ORDER BY id DESC");
            while($cdata = mysqli_fetch_array($getOrders)) {
                ?>
                <tr onclick="location.href = '<?= base_url('panel_admin/?target=contact&subtarget=detail&contact_id=').$cdata['id'] ?>'" style="cursor: pointer;">
                    <td><?= $no ?></td>
                    <td><?= date("d M Y H:i", $cdata['submitted']+(3600*5)) ?></td>
                    <td><?= base64_decode($cdata['fullname']) ?></td>
                    <td><?= base64_decode($cdata['email']) ?></td>
                    <td><?= base64_decode($cdata['subject']) ?></td>
                </tr>
                <?php
                $no++;
            }
            ?>
        </tbody>
    </table>
    </div>
    <?php } else {
        switch($_GET['subtarget']) {
            case "detail":
                require("contact/detail.php");
                break;
        }
    } ?>
</div>