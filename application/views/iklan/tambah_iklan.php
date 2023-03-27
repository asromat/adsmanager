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
                        <h2 class="text-primary">Tambah Iklan</h2>
                    </div>
                    <?= form_open_multipart('') ?>
                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" id="jenis-iklan">Jenis Iklan</label>
                            <select class="form-control custom-select" name="tipe" onchange="showKontrak(this.value)">
                                <option value="isidentil">isidentil</option>
                                <option value="kontrak">kontrak</option>
                                <option value="service">service</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <!-- <label class="label" id="jenis-iklan">Lembaga</label> -->
                            <select class="form-control custom-select" name="vendor" id="vendor" style="display: none;">
                            <option value=""></option>
                            <?php
                            $this->db->order_by('vendor','ASC');
                            foreach ($this->fungsi->pilihan("tb_vendor_iklan")->result() as $key => $pilihan) {;
                            ?>
                            <option value="<?= $pilihan->id?>"><?= $pilihan->vendor?></option>
                            <?php }?>
                            </select>
                        </div>
                        <?php echo form_error('vendor') ?>
                    </div>

                    <div class="form-group basic">
                        <div class="input-wrapper">
                            <label class="label" id="select4">Jenis Media</label>
                            <select class="form-control custom-select" name="media">
                                <option value="berita">berita</option>
                                <option value="grafis">grafis</option>
                                <option value="video">video</option>
                                <option value="backlink">backlink</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label">Url</label>
                            <input type="text" name="url" class="form-control" id="url" placeholder="https://malangtimes.com/" value="<?= set_value('url'); ?>" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle" role="img" class="md hydrated" aria-label="close circle"></ion-icon>
                            </i>
                        </div>
                        <?php echo form_error('url') ?>
                    </div>
                    
                    

                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Tambah Kontrak</button>
                    </div>

                    </form>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
      function showKontrak(val)
      {
        console.log(val);
		var x = document.getElementById("vendor");
		if (val === "kontrak" || val === "service") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}			
      }
 </script>