// Dari Tabel Db News
<?php $news_writer = null;
$no = 1;
foreach ($row->result() as $key => $data) {; ?>
    <?php if ($data->news_writer != $news_writer) { ?>
        <?= $news_writer ?> - <?= $no ?> <br>
        <?php $news_writer = $data->news_writer ?>
        <?php $no = 1 ?>
    <?php } else { ?>
        <?php $no++ ?>
    <?php } ?>
<?php } ?>


// Seluruh data
<?php $news_writer = null;
$no = 1;
foreach ($row->result() as $key => $data) {; ?>
    <?= $data->news_writer ?> - <?= $data->news_title ?> <br>
<?php } ?>

// Tambah poin
<?php $nama_wartawan = null;
$total_poin = null;
$no = 1;
foreach ($row->result() as $key => $data) {; ?>
    <?php if ($data->nama_wartawan != $nama_wartawan) { ?>
        <?= $nama_wartawan ?> - <?= $no ?> - Poin <?= $total_poin ?><br>
        <?php $nama_wartawan = $data->nama_wartawan ?>
        <?php $no = 1;
        $total_poin = null; ?>
    <?php } else { ?>
        <?php $no++ ?>
        <?php $total_poin = $total_poin + $data->bobot_berita ?>
    <?php } ?>
<?php } ?>

// Akurat total poin + jumlah artikel
<?php
$nama_wartawan = null;
$total_poin = null;
$no = 1;
foreach ($row->result() as $key => $data) {; ?>
    <?php if ($data->nama_wartawan != $nama_wartawan) { ?>
        <?= $nama_wartawan ?> - <?= $no ?> - Poin <?= $total_poin ?><br>
        <?php $nama_wartawan = $data->nama_wartawan ?>
        <?php $no = 1;
        $total_poin = $data->bobot_berita; ?>
    <?php } else { ?>
        <?php $no++ ?>
        <?php $total_poin = $total_poin + $data->bobot_berita ?>
    <?php } ?>
<?php } ?>