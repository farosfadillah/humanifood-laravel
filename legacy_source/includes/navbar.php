<nav>
    <div class="container">
        <div class="primary">
            <a href="<?= base_url("") ?>" id="siteTitle"><img src="<?= base_url("assets/image/logo.png") ?>" /></a>
        </div>  
        <div class="menu">
            <div class="pages">
                <a href="<?= base_url("") ?>">Beranda</a>
                <a href="<?= base_url("portfolio") ?>">Portofolio</a>
                <a href="<?= base_url("gallery") ?>">Galeri</a>
                <a href="<?= base_url("about") ?>">Tentang</a>
                <a href="<?= base_url("contact") ?>">Kontak Kami</a>
            </div>
            <div class="account">
                <?php
                    if(isset($_SESSION['_userid'])) {
                        if(isset($user)) {
                            if($user['role'] == "user") {
                                echo '<a href="'.base_url("myOrder").'">Pesanan Saya</a>';
                            } elseif($user['role'] == "admin") {
                                echo '<a href="'.base_url("panel_admin/?target=pesanan").'" target="_blank">Panel Admin</a>';
                            }
                        }
                    }
                ?>
                <?= accountmenu() ?>
            </div>
        </div>
    </div>
</nav>