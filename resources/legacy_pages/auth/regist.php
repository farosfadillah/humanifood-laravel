<?php $pageTitle = "Daftar"; ?>
<div id="content-wrapper">
    <style>
        #registForm {
            margin: 16px auto;
            width: 365px;
            max-width: 100%;
            padding: 32px 32px;
            border: 1px solid #efefef;
            border-radius: 10px;
        }

        #registForm h1 {margin: 0px 0px 16px;text-align: center;}

        #registForm form {display: grid;gap: 5px;}
        #registForm form form,
        #registForm form input,
        #registForm form select {
            display: block;
            padding: 10px 10px;
            outline: none;
        }

        #registForm form button {
            background: var(--primary-color);
            border: 0px solid transparent;
            padding: 15px 0px;
            color: #EFEFEF;
            font-weight: bold;
        }

        #registForm .activity {display: flex;justify-content: space-between;margin-top: 32px;}
        #registForm .activity a {color: #131416;padding: 5px 10px;border: 1px solid #EFEFEF;border-radius: 4px;}
    </style>
    <div id="registForm">
        <h1>Daftar</h1>
        <form action="">
            <input type="text" name="fullname" placeholder="Nama Lengkap" />
            <input type="text" name="username" placeholder="Username" />
            <input type="text" name="phone" placeholder="No. Handphone" />
            <input type="password" name="password" placeholder="Password" />
            <input type="password" name="retypepassword" placeholder="Re-type Password" />
            <p id="message"></p>
            <button>DAFTAR</button>
        </form>
        <div class="activity" style="display: flex;align-items: center;">
            <span>Sudah punya akun?</span>
            <a href="<?= base_url("masuk") ?>">Masuk</a>
            <!-- <a href="<?= base_url("lupa") ?>">Lupa Password</a> -->
        </div>
    </div>
</div>
<script>
    $("button").on("click", function(e){
        e.preventDefault();
        var fn = $("input[name='fullname']").val(),
            un = $("input[name='username']").val(),
            ph = $("input[name='phone']").val(),
            pw = $("input[name='password']").val(),
            rp = $("input[name='retypepassword']").val(),
            form = $("form")[0],
            formData = new FormData(form);
        if(fn != "" && un != "" && ph != "" && pw != "" && rp != "") {
            if(pw == rp) {
                $.ajax({
                    url: "<?= base_url("endpoint/index.php?target=signup") ?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        console.log(data);
                        var response = JSON.parse(data);
                        if(response.success == true) {
                            window.location.replace("<?= base_url('') ?>");
                        } else {
                            $("p#message").hide();
                            $("p#message").html(response.message);
                            $("p#message").fadeIn();
                        }
                    },
                    error:function(data){
                        
                    }
                });
            }
        }
    });
</script>