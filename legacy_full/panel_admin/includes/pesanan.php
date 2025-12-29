<?php
$getUser = query("user","ORDER BY id ASC");
while($udata = mysqli_fetch_array($getUser)) {
    $users[$udata['id']] = array(
        "name" => $udata['name'],
        "phone" => $udata['nomor_handphone']
    );
}

$getProduct = query("product","ORDER BY id ASC");
while($pdata = mysqli_fetch_array($getProduct)) {
    $product[$pdata['id']] = array(
        "title" => $pdata['title'],
        "price" => $pdata['hpp']
    );
}
?>
<style>
    table.table tbody tr:hover {
        background: #F0F0F0;
    }
</style>
<div>
    <?php if(!isset($_GET['subtarget'])) { ?>
    <h2>Daftar Pesanan</h2>
    <div class="mt-3" style="max-width: 1200px;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tanggal Dipesan</th>
                <th scope="col">Produk</th>
                <th scope="col">Nama Pemesan</th>
                <th scope="col">Nomor Handphone</th>
                <th scope="col">Waktu Pemesanan</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $getOrders = query("orders","ORDER BY id DESC");
            while($odata = mysqli_fetch_array($getOrders)) {
                
                switch($odata['status']) {
                    case 0:
                        $status = "Sedang Ditinjau";
                        break;
                    case 1:
                        $status = "Order Diterima";
                        break;
                    case 2:
                        $status = "Pembayaran Dikonfirmasi.";
                        break;
                    case 3:
                        $status = "Order Ditolak";
                        break;
                    case 4:
                        $status = "Pembayaran Tidak Valid";
                        break;
                }
                
                ?>
                <tr onclick="location.href = '<?= base_url('panel_admin/?target=pesanan&subtarget=detail&order_id=').$odata['id'] ?>'" style="cursor: pointer;">
                    <td><?= $no ?></td>
                    <td><?= date("d M Y H:i", $odata['ordered']+(3600*5)) ?></td>
                    <td><?= $product[$odata['product_id']]['title'] ?></td>
                    <td><?= $users[$odata['user_id']]['name'] ?>: <?= base64_decode($odata['name']) ?></td>
                    <td><?= $users[$odata['user_id']]['phone'] ?> (<?= base64_decode($odata['phone']) ?>)</td>
                    <td><?= base64_decode($odata['order_date']) ?></td>
                    <td><?= $status ?></td>
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
                require("pesanan/detail.php");
                break;
            case "chat":
                require("pesanan/chat.php");
                break;
        }
    } ?>
</div>