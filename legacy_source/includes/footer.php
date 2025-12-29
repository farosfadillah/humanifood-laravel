<footer>
    <div class="container text-center">
        <span>Copyright &copy; 2023 | <b><?= $site['title'] ?></b></span>
    </div>
</footer>
<?php if(isset($pageTitle)) {   // jika terdapat variabel ($pageTitle) ?>
<script>$("title").html("<?= $pageTitle . " | " . $site['slogan'] ?>"); // set title baru</script>
<?php } ?>
</body>
</html>