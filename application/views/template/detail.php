<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title><?= $menu?></title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="<?=base_url()?>/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url()?>/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
    <link rel="manifest" href="<?=base_url()?>/__manifest.json">
</head>

<body class="bg-white">

    <!-- loader -->
    <div id="loader">
        <img src="<?=base_url()?>/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
<div class="appHeader">
    <div class="left">
        <a href="<?= base_url("iklan/kontrak") ?>" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        <?= $menu ?>
    </div>
    <!-- <div class="right">
        <a href="#" class="headerButton" data-bs-toggle="modal" data-bs-target="#addCardActionSheet">
            <ion-icon name="add-outline"></ion-icon>
        </a>
    </div> -->
</div>
<!-- * App Header -->

	<?= $contents?>

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="<?= base_url("")?>" class="item <?=$this->uri->segment(1) == '' ? "active" : ""?>">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="<?= base_url("subtema/pencarian")?>" class="item <?=$this->uri->segment(2) == 'pencarian' ? "active" : ""?>">
            <div class="col">
                <ion-icon name="stats-chart-outline"></ion-icon>
                <strong>Statistik</strong>
            </div>
        </a>
        <a href="<?= base_url("pertanyaan")?>" class="item <?=$this->uri->segment(1) == 'pertanyaan' ? "active" : ""?>">
            <div class="col">
                <ion-icon name="add-circle-outline"></ion-icon>
                <strong>Input</strong>
            </div>
        </a>
        <a href="<?= base_url("pertanyaan")?>" class="item <?=$this->uri->segment(1) == 'pertanyaan' ? "active" : ""?>">
            <div class="col">
                <ion-icon name="book-outline"></ion-icon>
                <strong>Data</strong>
            </div>
        </a>
        <a href="<?= base_url("page/profil")?>" class="item <?=$this->uri->segment(2) == 'profil' ? "active" : ""?>">
            <div class="col">
				<ion-icon name="person-circle-outline"></ion-icon>
                <strong>Profil</strong>
            </div>
        </a>        
    </div>
    <!-- * App Bottom Menu -->


    <!-- ========= JS Files =========  -->
    <!-- Bootstrap -->
    <script src="<?=base_url()?>/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Splide -->
    <script src="<?=base_url()?>/assets/js/plugins/splide/splide.min.js"></script>
    <!-- Base Js File -->
    <script src="<?=base_url()?>/assets/js/base.js"></script>


</body>

</html>
