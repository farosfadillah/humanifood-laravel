<?php $pageTitle = "Masuk"; ?>
<div id="content-wrapper">
    <div class="container">
        <style>
            #loginForm {
                margin: 0px auto;
                width: 400px;
                max-width: 100%;
                padding: 32px 32px;
                border: 1px solid #efefef;
                border-radius: 10px;
            }

            #loginForm h1 {margin: 0px 0px 16px;text-align: center;}

            #loginForm form {display: grid;gap: 5px;}
            #loginForm form * {
                display: block;
                padding: 10px 10px;
                outline: none;
            }

            #loginForm form input[type='button'],
            #loginForm form button {
                background: var(--primary-color);
                border: 0px solid transparent;
                padding: 15px 0px;
                color: #EFEFEF;
                font-weight: bold;
            }

            a,
            button,
            input[type='button'],
            input[type='submit'],
            button {
                cursor: pointer;
            }

            #loginForm .activity {display: flex;justify-content: space-between;margin-top: 32px;}
            #loginForm .activity a {color: #131416;padding: 5px 10px;border: 1px solid #EFEFEF;border-radius: 4px;}
        </style>
        <div id="loginForm">
            <h1>Masuk</h1>
            <?php if(isset($_GET['next'])) { ?>
                <p class="alert alert-danger p-2 rounded text-center">Anda harus login terlebih dahulu.</p>
            <?php } ?>
            <form method="POST">
                <input type="text" name="username" placeholder="Username" />
                <input type="password" name="password" placeholder="Password" />
                <!--<input type="button" value="LOG IN" />-->
                <button>LOG IN</button>
            </form>
            <div class="activity">
                <a href="<?= base_url("daftar") ?>">Daftar</a>
            </div>
        </div>
        <?php
        $gto = base_url("");
        if(isset($_GET['next'])) {
            $gto = base_url(base64_decode($_GET['next']));
        }
        ?>
        <script>
            // $("input[type='button']").on("click", function(){
            $("button").on("click", function(e){
                e.preventDefault();
                var form = $("form")[0],
                    formData = new FormData(form);
                $.ajax({
                    url: "<?= base_url("endpoint/index.php?target=auth") ?>",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success:function(data){
                        console.log(data);
                        var response = JSON.parse(data);
                        if(response.success == true) {
                            window.location.replace("<?= $gto; ?>");
                        } else {
                            
                        }
                    },
                    error:function(data){
                        
                    }
                });
            });
        </script>
    </div>
</div>