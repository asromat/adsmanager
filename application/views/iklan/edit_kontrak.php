<!-- App Header -->
<div class="appHeader bg-primary text-light">
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

<div id="appCapsule">
    <div class="section mt-2">
        <div class="card">
            <div class="card-body">
                <div class="p-1">
                    <div class="text-center">
                        <h2 class="text-primary">Edit Detail Kontrak <br> <?= $this->input->post('vendor') ?? $row->vendor ?></h2>
                        <p>Masukkan data kontrak iklan yang ditangani</p>
                    </div>
                    <?= form_open_multipart('') ?>
                    <input type="hidden" name="id" required="" value="<?= $this->input->post('id') ?? $row->id ?>">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="select4">Jenis Kontrak</label>
                            <select class="form-control custom-select" id="select4" name="status">
                                <option value="<?= $row->status?>">Pilihan : <?= $row->status?></option>
                                <option value="berlajan">Berjalan</option>
                                <option value="selesai">Selesai</option>
                                <option value="prospek">Prospek</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group boxed animated">
                        <div class="input-wrapper">
                            <label class="label" for="vendor">Nama Vendor</label>
                            <input type="text" name="vendor" class="form-control" id="vendor" placeholder="Nama - Ex: PEMKOT MALANG" value="<?= $this->input->post('vendor') ?? $row->vendor ?>" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                        <?php echo form_error('vendor') ?>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="text4">Mulai Tanggal</label>
                            <input type="datetime-local" class="form-control" name="mulai_tgl" value="<?= $row->mulai_tgl?>" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                        <?php echo form_error('mulai_tgl') ?>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="text4">Sampai Tanggal</label>
                            <input type="datetime-local" class="form-control" name="sampai_tgl" value="<?= $row->sampai_tgl?>" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                        <?php echo form_error('sampai_tgl') ?>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="text4b">Nilai Kontrak</label>
                            <input type="number" name="nilai" class="form-control" id="text4b" placeholder="Ex: 10000000" value="<?= $this->input->post('nilai') ?? $row->nilai ?>" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                        <?php echo form_error('nilai') ?>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="text4b">Jumlah Berita</label>
                            <input type="text" name="q_berita" class="form-control" id="text4b" placeholder="Ex: 8" value="<?= $this->input->post('q_berita') ?? $row->q_berita ?>" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                        <?php echo form_error('q_berita') ?>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="text4b">Jumlah Video / Tiktok</label>
                            <input type="text" name="q_video" class="form-control" id="text4b" placeholder="Ex: 8" value="<?= $this->input->post('q_video') ?? $row->q_video ?>" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                        <?php echo form_error('qvideo_tgl') ?>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="text4b">Jumlah Grafis</label>
                            <input type="text" name="q_grafis" class="form-control" id="text4b" placeholder="Ex: 8" value="<?= $this->input->post('q_grafis') ?? $row->q_grafis ?>" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                        <?php echo form_error('q_grafis') ?>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" for="textarea4">Keterangan</label>
                            <textarea name="keterangan" id="textarea4" rows="2" class="form-control" placeholder="Keterangan Tambahan"><?= $this->input->post('keterangan') ?? $row->keterangan ?></textarea>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                        <?php echo form_error('keterangan') ?>
                    </div>

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Edit Kontrak</button>
                    </div>

                    </form>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>