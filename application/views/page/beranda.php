<!-- App Capsule -->
<div id="appCapsule">
	<div class="section full gradientSection">
		<div class="in">
			<h5 class="title mb-2">Anda Login Sebagai <?= $this->fungsi->status($this->session->tipe_user) ?></h5>
			<h1 class="total">Selamat Datang <br> <?= $this->session->nama ?></h1>
			<h4 class="caption">
				di JTN NETWORK ADS MANAGER
			</h4>
		</div>
	</div>

	<!-- Fitur -->
	<div class="section mt-4">
		<div class="section-heading">
			<h2 class="title">Apa yang ingin kamu lakukan? </h2>
			<!-- <a href="app-savings.html" class="link">View All</a> -->
		</div>
		<?php $this->view('message') ?>
		<div class="goals">
			<!-- item -->
			<div class="item">
				<div class="in">
					<div>
						<a href="<?= base_url("iklan/kontrak")?>">
							<h4>Tambah Kontrak</h4>
						</a>
						<p>Data Lembaga/Instantsi yang Berkerjasama</p>
					</div>
					<a href="<?= base_url("iklan/kontrak")?>">
						<h1>
							<ion-icon name="business-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="<?= base_url("iklan/tambahIklan")?>">
							<h4>Tambah Iklan</h4>
						</a>
						<p>Input Perkembangan Iklan</p>
					</div>
					<a href="<?= base_url("iklan/tambahIklan")?>">
						<h1>
							<ion-icon name="add-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="<?= base_url("iklan/data")?>">
							<h4>Data Iklan</h4>
						</a>
						<p>Data keseluruhan iklan yang telah dibuat</p>
					</div>
					<a href="<?= base_url("iklan/data")?>">
						<h1>
							<ion-icon name="book-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="<?= base_url("statistik/exportwartawan")?>">
							<h4>Statistik</h4>
						</a>
						<p>Pantau perkembangan kontrak</p>
					</div>
					<a href="<?= base_url("statistik/exportwartawan")?>">
						<h1>
							<ion-icon name="stats-chart-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="<?= base_url("page/petunjuk") ?>">
							<h4>Petunjuk</h4>
						</a>
						<p>Klik untuk membaca Tutorial</p>
					</div>
					<a href="<?= base_url("page/petunjuk") ?>">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
				<div class="in">
					<div>
						<a href="<?= base_url("iklangeser") ?>">
							<h4>Tambah Iklan Slider</h4>
						</a>
						<p>Iklan Slider</p>
					</div>
					<a href="<?= base_url("iklangeser") ?>">
						<h1>
							<ion-icon name="arrow-forward-circle-outline"></ion-icon>
						</h1>
					</a>
				</div>
			</div>
			<!-- * item -->
		</div>
	</div>
	<!-- ! Fitur -->
	
	<br>
	<br>
</div>
<!-- * App Capsule -->