<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row justify-content-center">
				<img src="<?=base_url('@mazer/prixier/img/logo_contoh_tengah.svg')?>" alt="logo" style="max-width: 10%; height: auto; margin-top: 50px; margin-bottom: 15px;">
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">

					</ol>
				</nav>
			</div>
		</div>

		<section class="section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 col-12">
						<div class="card">
							<form action="<?= base_url('album/aksi_tambah_gambar')?>" method="post" class="row g-3" enctype="multipart/form-data">
								<div class="card-header bg-primary">
									<h4 class="card-title text-white d-flex justify-content-center align-items-center" style="margin-bottom: 0px;">Tambah Gambar Baru</h4>
								</div>
								<div class="card-body">
									<div class="row">

										<div class="">
											<label for="logo_perusahaan" class="form-label">Gambar Baru</label>
											<div class="mb-3">
												<div class="custom-file">
													<div class="col-12 col-md-12">
														<input type="file" class="logo-perusahaan" id="gambar_baru" name="gambar_baru" accept="image/*" onchange="previewImage()" required>
													</div>
												</div>
											</div>
											<div id="preview"></div>
										</div>

										<div class="mb-3">
											<label for="namaalbum" class="form-label">Judul Gambar</label>
											<input type="text" class="form-control" id="judul_gambar" placeholder="Masukkan Judul Gambar" name="judul_gambar" required>
										</div>

										<div class="mb-3">
											<label for="namasiswa" class="form-label">Deskripsi Gambar</label>
											<textarea class="form-control" id="deskripsi_gambar" rows="3" name="deskripsi_gambar" placeholder="Masukkan Deskripsi Gambar (Opsional)" style="height: 75px;"></textarea>
										</div>

										<div class="mb-3">
											<label for="namasiswa" class="form-label">Album Gambar</label>
											<select class="form-select" id="album" placeholder="Masukkan Album Gambar" name="album" required>
												<option value="">- Pilih -</option>
												<?php foreach ($album as $a): ?>
													<option value="<?= $a->id_album ?>"><?= $a->nama_album ?></option>
												<?php endforeach; ?>
											</select>
										</div>

										<!-- bagian tombol submit -->
										<div class="col-12">
											<div class="ln_solid"></div>
											<div class="form-group">
												<div class="col-md-0 col-md-offset-0">
													<a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
													<button type="submit" class="btn btn-primary">Submit</button>
												</div>
											</div>
										</div>
										<!-- bagian tombol submit -->
									</form>
								</div>
							</body>
							</html>