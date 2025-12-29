<style>    
    #ctas {margin-top: 32px;}
    #ctas input[type="submit"]#atc {
        width: 100%;
        padding: 10px 16px;
        border: 0px solid transparent;
        background: var(--primary-color);
        color: #EFEFEF;
        border-radius: 4px;
        cursor: pointer;
    }

    #ctas .price {margin: 0px 0px 10px;display:grid;}
    #ctas .price h5 {display: inline;font-size: 27px;font-weight: normal;border-bottom: 2px solid #000;padding-bottom: 2px;}

    #ctas .num input {outline: none;}
    #ctas .num {padding: 16px 0px;display: grid;gap: 5px;grid-template-columns: 1fr 2fr 1fr;align-items: center;}

    .qty {
        width: 100%;
        height: 50px;
        text-align: center;
        font-size: 40px;
    }
    input.qtyplus,
    input.qtyminus {
        width: 100%;
        height: 35px;
        font-size: 19px;
        cursor: pointer;
    }

    #ctas .calc h2 {
        font-size: 32px;
        margin: 0px 0px 10px;
    }

    @media (min-width: 576px) {
        #detailHolder {grid-template-columns: 8fr 5fr;}
    }
</style>
<?php
isset($site) && isset($_GET) OR exit('No direct script access allowed');
$slug = getSlug($_GET['slug']);
$get = select("product","slug='$slug'");
if (mysqli_num_rows($get) == 1) { $product = mysqli_fetch_array($get); $pageTitle = "Produk: " . $product['title']; ?>
<div class="mt-2 mb-5" style="margin-top: 16px;">
    <div class="container" style="background: #FFF;overflow: hidden;">
        <img src="<?= base_url("assets/image/product/").$product['photo']; ?>" style="object-fit: cover;aspect-ratio: 16/9;border-radius: 5px;width: 100%;" />
        <div id="detailHolder" class="d-grid mt-4" style="gap: 16px;">
            <div>
                <h1><?= $product['title'] ?></h1>
                <?= base64_decode($product['content']) ?>
            </div>
            <div id="ctas">
                <p><b>Minimum pemesanan:</b> <?= $product['minimum'] ?> Paket</p>
                <form action="<?= base_url("order") ?>" method="GET">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
                    <div class="price">
                        <span><h5>Rp. <?= number_format($product['hpp'],0,',','.') ?></h5><span>/pkg</span></span>
                    </div>
                    <div class="num">
                        <input type='button' value='-' class='qtyminus' field='quantity' />
                        <input type='number' name='quantity' value='<?= $product['minimum'] ?>' class='qty'/>
                        <input type='button' value='+' class='qtyplus' field='quantity' />
                    </div>
                    <div class="calc">
                        <span>Uang Muka (50% Total Harga) :</span>
                        <h2>Rp. <span><?= number_format(($product['hpp']*$product['minimum'])/2,0,',','.') ?></span></h2>
                    </div>
                    <input type="submit" id="atc" data-product_id="<?= $product['id']; ?>" value="Pesan Sekarang"/>
                </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<script>
    $('.qtyminus').on('click', function(e) {
        let input = $('input.qty');
        let val = parseInt(input.val());
        if(val > <?= $product['minimum'] ?>) {
            input.val( val-1 ).change();
        }
    });

    $('.qtyplus').on('click', function(e) {
        let input = $('input.qty');
        var val = parseInt(input.val());
        input.val( val+1 ).change();
    });
    
    $("input[name='quantity']").on("change", function(){
        let hpp = <?= $product['hpp'] ?>;
        let input = $('input.qty');
        let val = parseInt(input.val());
        if(val > <?= $product['minimum'] ?>) {
            let now = (val*hpp) / 2;
            let now_new = now.toLocaleString();
            $(".calc h2 span").html(now_new);
        } else {
            input.val("<?= $product['minimum'] ?>");
            let now = (val*hpp) / 2;
            let now_new = now.toLocaleString();
            $(".calc h2 span").html(now_new);
        }
    });
</script>