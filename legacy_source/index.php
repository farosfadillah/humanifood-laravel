<?php
require("_function.php");                       // include/require file di folder yang sama yang bernama _function.php 
require("includes/head.php");                   // include/require file di folder includes yang bernama head.php
navbar();
?>
<style>
    .color-primary {color: #9e2121;}

    h1,h2 {
        color: #9e2121;
    }
    
    section {
        padding: 0em 0px 2em;
    }
    
    section#hero {
        background: #9e3131;
        color: #EFEFEF;
        padding: 5em 0px;
    } section#hero h1 {font-weight: bold;color: #EFEFEF;}
    
    section#cs {
    } section#cs p {
        font-size: 19px;
    }
</style>
<section id="hero">
    <div class="container">
        <h1>Selamat Datang di Humanifood</h1>
        <h3>Eat Healthy Think Better</h3>
        <p>Humanifood Catering Service adalah salah satu unit bisnis PT. Ghaniya Berkah yang bergerak dibidang Pengadaan Jasa Boga (catering) berkualitas dengan mengedepankan pelayanan yang terbaik untuk kepuasan pelanggan. HMFD Catering Service menyediakan berbagai macam kebutuhan seperti : pernikahan, ulang tahun, meeting, training, lunch atau event lainnya.</p>
    </div>
</section>
<div id="content-wrapper">
    <div class="container">
        <section>
            <h2 class="mb-3">Pilihan Paket Catering</h2>
            <div class="grid grid-3">
                <?php
                $qproduct = query("product","ORDER BY id DESC");    // ambil data dari table product dan di urut berdasarkan ID nya secara terbalik
                while($product = mysqli_fetch_array($qproduct)) {   // loop hasil query dan simpan data per baris ke dalam array di dalam variabel $product
                    include("includes/loop/product.php");           // include/require file di folder includes/loop yang bernama product.php
                }
                ?>
            </div>
        </section>
        <section id="portfolio">
            <h2 class="mb-3">Klien Kami</h1>
            <div class="grid grid-2">
                <div class="menu-item column_first ">
                    <div class="clearfix menu-wrapper">
                        <h4>PT. YKK Zipper Indonesia</h4>
                        
                        <div class="dotted-bg"></div>
                    </div>
                    <p>Penyedia Makan Siang Untuk Para Karyawannya (Sejak 2021).</p>
                </div>
                <div class="menu-item column_last ">
                    <div class="clearfix menu-wrapper">
                        <h4>PT. Konishi Lemindo Indonesia</h4>
                        
                        <div class="dotted-bg"></div>
                    </div>
                    <p>Penyedia Makan Siang Untuk Para Karyawannya (Sejak 2021).</p>
                </div>
                <div class="menu-item column_first ">
                    <div class="clearfix menu-wrapper">
                        <h4>PT. Nicholas Laboratories Industries</h4>
                        
                        <div class="dotted-bg"></div>
                    </div>
                    <p>Penyedia Makan Siang Untuk Para Karyawannya (Sejak 2021).</p>
                </div>
                <div class="menu-item column_last ">
                    <div class="clearfix menu-wrapper">
                        <h4>NET. TV</h4>
                        
                        <div class="dotted-bg"></div>
                    </div>
                    <p>Penyedia Makan Siang untuk Karyawannya (Sejak 2019).</p>
                </div>
            </div>
            <div class="d-block mt-3" style="text-align: right;">
                <a href="<?= base_url("portfolio") ?>" class="color-primary">Lihat selengkapnya >></a>
            </div>
        </section>
        <section id="galeri">
            <h2 class="mb-3">Galeri</h1>
            <div class="grid grid-4">
                <img src="<?= base_url("assets/image/gallery/daging-gepuk.jpg") ?>" />
                <img src="<?= base_url("assets/image/gallery/rendang-daging.jpg") ?>" />
                <img src="<?= base_url("assets/image/gallery/ayam-goreng.jpg") ?>" />
                <img src="<?= base_url("assets/image/gallery/rendang-ayam.jpg") ?>" />
            </div>
            <div class="d-block mt-3" style="text-align: right;">
                <a href="<?= base_url("gallery") ?>" class="color-primary">Lihat selengkapnya >></a>
            </div>
        </section>
        <section id="legalitas">
            <h2 class="mb-3">Legalitas Usaha</h1>
            <div class="grid grid-3">
                <img src="<?= base_url("assets/image/legalitas/nib.jpg") ?>" />
                <img src="<?= base_url("assets/image/legalitas/mui.jpg") ?>" />
                <img src="<?= base_url("assets/image/legalitas/iso.jpg") ?>" />
            </div>
        </section>
        <section id="kontak">
            <h2 class="mb-3">Kontak Kami</h1>
            <div class="grid grid-2">
                <div>
                     <p><i class='fa fa-phone'></i> +62 859 7317 3321<br/>
                        <i class='fa fa-map-marker'></i> Jl. Anggrek No. 57C, Gas Alam, Curug, Cimanggis - Depok 16453<br/>
                        <i class='fa fa-envelope-o'></i> Info@humanifood.com
                    </p>
                </div>
                <div>
                    <b>JAM OPERASIONAL</b>
                    <p>08:00 WIB to 18:00 WIB on Senin - Jumat<br/>10:00 WIB to 16:00 WIB on Sabtu - Minggu</p>
                </div>
            </div>
        </section>
    </div>
</div>
<?php footer(); ?>