<div id="content-wrapper">
    <div class="container">
        <h1 class="special">Kontak Kami</h1>
        <div class="grid grid-2">
            <div>
                <b>ALAMAT</b>
                <p><i class='fa fa-map-marker'></i> Jl. Anggrek No. 57C, Gas Alam, Curug, Cimanggis - Depok 16453</p>
                <p><i class='fa fa-phone'></i> +62 859 7317 3321</p>
                <p><i class='fa fa-envelope-o'></i> Info@humanifood.com</p>
                <b>JAM OPERASIONAL</b>
                <p>08:00 WIB to 18:00 WIB on Senin - Jumat<br/>10:00 WIB to 16:00 WIB on Sabtu - Minggu</p>
            </div>
            <div>
                <form method="POST" id="kontak" style="display: grid;gap: 10px;">
                    <input type="text" class="form-control" name="fullName" placeholder="Full Name" />
                    <input type="email" class="form-control" name="email" placeholder="Email Address" />
                    <input type="text" class="form-control" name="subject" placeholder="Subject" />
                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                    <p id="message"></p>
                    <input type="button" class="form-control btn btn-warning" value="SEND MESSAGE" />
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $("form#kontak input[type='button']").on("click", function(){
        var form = $("form")[0],
            formData = new FormData(form);
        $.ajax({
            url: "<?= base_url("endpoint/index.php?target=contact") ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success:function(data){
                console.log(data);
                var response = JSON.parse(data);
                if(response.success == true) {
                    $("p#message").hide();
                    $("p#message").html("Berhasil terkirim. Admin Kami akan segera membalas pesan Anda.");
                    $("p#message").show();
                } else {
                    $("p#message").hide();
                    $("p#message").html("Tidak berhasil terkirim. Silahkan coba lagi.");
                    $("p#message").show();
                }
            },
            error:function(data){
                
            }
        });
    });
</script>