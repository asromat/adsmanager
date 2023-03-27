<!-- App Header -->
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="<?= base_url("")?>" class="headerButton">
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

<div id="appCapsule">
    <div class="section mt-2">
        <div class="section-heading">
            <h2 class="title">Kontrak Berjalan</h2>
            <a href="<?= base_url("kontrak/dataAll/") ?>" class="link">Semua</a>
        </div>
        <div class="section-heading">
            <a href="<?= base_url("iklan/tambahKontrak") ?>" class="btn btn-primary">Tambah Baru</a>
        </div>
        <div class="card">
            <?php $this->view('message') ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr class="bg-primary">
                            <th scope="col" width="40%">Nama</th>
                            <th scope="col" width="10%">Status</th>
                            <th scope="col" width="30%">Durasi</th>
                            <th scope="col" class="text-end" width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($row->result() as $key => $data) {; ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url("iklan/detailKontrak/" . $data->id) ?>"><font size="5px"><?= $data->vendor ?></font></a> <br>
                                    <span class="badge badge-primary">Nilai : <?= $data->nilai ?></span><br>
                                    <span class="badge badge-danger">Berita <?= $data->q_berita ?></span>
                                    <span class="badge badge-warning">Infografis <?= $data->q_grafis ?></span>
                                    <span class="badge badge-success">Video <?= $data->q_video ?></span>
                                </td>
                                <td>
                                    <?= $data->status ?>
                                </td>
                                <td>
                                    <?= $this->fungsi->timetostr("d-m-y", $data->mulai_tgl) ?> s.d.
                                    <?= $this->fungsi->timetostr("d-m-y", $data->sampai_tgl) ?>
                                </td>
                                <td class="text-end text-primary">
                                    <a href="<?= base_url("iklan/editKontrak/" . $data->id) ?>">Edit</a>
                                    <a href="<?= base_url("iklan/hapusKontrak/" . $data->id) ?>">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<br>