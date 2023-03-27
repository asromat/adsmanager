<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>JTN Ads Manager - <?= $menu ?></title>
    <meta name="description" content="Jatim Times Network Ads Manager - Provided by JTN IT">
    <meta name="keywords" content="Ads Manager Jatim Times" />
    <link rel="icon" type="image/png" href="https://www.jatimtimes.com/v3/assets/img/logo/favicon.ico" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.jatimtimes.com/v3/assets/img/logo/favicon.ico">
    <link rel="stylesheet" href="<?=base_url()?>/assets/css/style.css">
    <link rel="manifest" href="<?=base_url()?>/__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?=base_url()?>/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

	<?= $contents ?>

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
