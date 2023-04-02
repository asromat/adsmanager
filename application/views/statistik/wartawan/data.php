<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="<?= base_url("") ?>" class="headerButton">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">
        <?= $menu ?>
    </div>
</div>
<!-- * App Header -->

<div id="appCapsule">
    <div class="section mt-2">
        <div class="section-heading">
            <h2 class="title">Statistik</h2>
            <a href="<?= base_url("kontrak/dataAll/") ?>" class="link">Semua</a>
        </div>
        <div class="card">
            <?php $this->view('message') ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col" width="40%">Nama</th>
                            <th scope="col" width="10%">Jumlah Berita</th>
                            <th scope="col" width="30%">Total Poin</th>
                            <th scope="col" class="text-end" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nama_wartawan = null;
                        $total_poin = null;
                        $no = 1;
                        foreach ($row->result() as $key => $data) {; ?>
                            <?php if ($data->nama_wartawan != $nama_wartawan) { ?>
                                <tr>
                                    <td>
                                        <?= $nama_wartawan ?>
                                    </td>
                                    <td>
                                        <?= $no ?>
                                    </td>
                                    <td>
                                        <?= $total_poin?>
                                    </td>
                                    <td>
                                        Detail
                                    </td>
                                </tr>
                                <?php $nama_wartawan = $data->nama_wartawan ?>
                                <?php $no = 1;
                                $total_poin = $data->bobot_berita; ?>
                            <?php } else { ?>
                                <?php $no++ ?>
                                <?php $total_poin = $total_poin + $data->bobot_berita ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<?php $nama_wartawan = null;
$no = 1;
foreach ($row->result() as $key => $data) {; ?>
    <?= $data->nama_wartawan ?> - <?= $data->judul ?> <br>
<?php } ?>
<br>
<br>
<br>
<?php $nama_wartawan = null;
$no = 1;
foreach ($row->result() as $key => $data) {; ?>
    <?php if ($data->nama_wartawan == $nama_wartawan) { ?>
        <?php $no++ ?>
    <?php } else { ?>
        <?= $nama_wartawan ?> - <?= $no ?> <br>
        <?php $nama_wartawan = $data->nama_wartawan ?>
        <?php $no = 1 ?>
    <?php } ?>
<?php } ?>
<?= $nama_wartawan = $data->nama_wartawan?> - <?= $no ?>
<br>
<br>
<?php
$nama_wartawan = null;
$total_poin = null;
$no = 1;
foreach ($row->result() as $key => $data) {; ?>
    <?php if ($data->nama_wartawan == $nama_wartawan) { ?>
        <?php $no++ ?>
        <?php $total_poin = $total_poin + $data->bobot_berita ?>
    <?php } else { ?>
        <?= $nama_wartawan ?> - <?= $no ?> - Poin <?= $total_poin ?><br>
        <?php $nama_wartawan = $data->nama_wartawan ?>
        <?php $no = 1;
        $total_poin = $data->bobot_berita; ?>
    <?php } ?>
<?php } ?>
<?= $nama_wartawan = $data->nama_wartawan?> - <?= $no ?>
<br><br><br><br>