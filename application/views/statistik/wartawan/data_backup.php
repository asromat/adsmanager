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
                        <?php $news_writer = null;
                        $no = 1;
                        foreach ($row->result() as $key => $data) {; ?>
                            <?php if ($data->news_writer != $news_writer) { ?>
                                <tr>
                                    <td>
                                        <?= $news_writer ?>
                                    </td>
                                    <td>
                                        <?= $no ?>
                                    </td>
                                    <td>
                                        <?= $this->hitung->totalPoin($news_writer,"2022","08")->row("bobot_berita");?>
                                    </td>
                                    <td>
                                        Action
                                    </td>
                                </tr>
                                <?php $news_writer = $data->news_writer ?>
                                <?php $no = 1 ?>
                            <?php } else { ?>
                                <?php $no++ ?>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<br>