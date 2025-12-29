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
        "slug" => $pdata['slug'],
        "title" => $pdata['title']
    );
}

$ui = $user['id'];
?>

<style>
    table.table tbody tr:hover {
        cursor: pointer;
        background: #F0F0F0;
    }
</style>
<div class="container mb-5">
    <?php if(!isset($_GET['subtarget'])) { ?>
        <div class="detailinfo">
            <main>
                <div class="row g-5 py-5">
                    <div class="text-center">
                        <img class="d-block mx-auto mb-4" src="<?= base_url("assets/image/icon-192x192.png") ?>" alt="" width="72">
                        <h2>Daftar Pesanan Anda</h2>
                        <p class="lead text-center">Berikut adalah daftar pesanan yang Anda lakukan</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
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
                                $check = query("orders","WHERE user_id='$ui' ORDER BY id DESC");
                                $no = 1;
                                while($data = mysqli_fetch_array($check)) {
                                    switch($data['status']) {
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
                                    <tr onclick="window.open('<?= base_url('myOrder?subtarget=detail&order_id=').$data['id'] ?>')">
                                        <td><?= $no ?></td>
                                        <td><?= date("d M Y H:i", $data['ordered']) ?></td>
                                        <td><?= $product[$data['product_id']]['title'] ?></td>
                                        <td><?= base64_decode($data['name']) ?></td>
                                        <td><?= base64_decode($data['phone']) ?></td>
                                        <td><?= base64_decode($data['order_date']) ?></td>
                                        <td><?= $status ?></td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    <?php } else {
        switch($_GET['subtarget']) {
            case "detail":
                require("myOrder/detail.php");
                break;
            case "chat":
                require("myOrder/chat.php");
                break;
        }
    } ?>
</div>