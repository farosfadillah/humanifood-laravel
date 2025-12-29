<style>
    a {cursor: pointer;}
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./?target=pesanan" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="object-fit: cover;aspect-ratio: 1/1;">
        <span class="brand-text font-weight-light"> <?= $site['title'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("panel_admin?target=pesanan") ?>" data-target="pesanan"><i class="nav-icon fa fa-shopping-bag"></i>    <p>Pesanan</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("panel_admin?target=produk") ?>" data-target="produk"><i class="nav-icon fa fa-list"></i>    <p>Produk</p></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("panel_admin?target=contact") ?>" data-target="contact"><i class="nav-icon fa fa-envelope"></i>    <p>Formulir Kontak</p></a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>