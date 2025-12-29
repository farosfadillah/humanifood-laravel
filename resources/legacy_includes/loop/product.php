<div class="col product">
    <a href="<?= base_url("produk/").$product['slug'] ?>">
        <div class="img" style="background: linear-gradient(to bottom, transparent 50%, rgba(158, 33, 33,1)), url(<?= base_url("assets/image/product/").$product['photo'] ?>);background-size: cover;"></div>
        <div class="info" style="padding: 0px 20px;">
            <h3><?= $product['title']; ?></h3>
        </div>
    </a>
    <div style="width: 100%;padding: 20px 20px 20px;position: absolute;bottom: 0;margin: 10px 0px 0px;display: flex;justify-content: space-between;">
        <div><h4>Rp. <?= number_format($product['hpp'],0,',','.'); ?></h4><span style="display: inline;">/pkg</span></div>
        <h4 style="border-bottom: 0px;">Min: <?= $product['minimum'] ?></h4>
    </div>
</div>