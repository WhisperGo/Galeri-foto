<div id="main-content">
	<div class="page-heading">
		<div class="page-title">
			<div class="row justify-content-center">
				<img src="<?=base_url('@mazer/prixier/img/logo_contoh_tengah.svg')?>" alt="logo" style="max-width: 10%; height: auto; margin-top: 50px; margin-bottom: 25px;">
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
							<form action="<?= base_url('album/aksi_tambah_album')?>" method="post" class="row g-3" enctype="multipart/form-data">
								<div class="card-header bg-primary">
									<h4 class="card-title text-white d-flex justify-content-center align-items-center" style="margin-bottom: 0px;">Tambah Album Baru</h4>
								</div>
								<div class="card-body">
									<div class="row">

										<div class="">
											<label for="logo_perusahaan" class="form-label">Gambar Album (Opsional)</label>
											<div class="mb-3">
												<div class="custom-file">
													<div class="col-12 col-md-12">
														<input type="file" class="logo-perusahaan" id="gambar_album" name="gambar_album" accept="image/*">
													</div>
												</div>
											</div>
											<div id="preview"></div>
										</div>

										<div class="mb-3">
											<label for="namaalbum" class="form-label">Nama Album</label>
											<input type="text" class="form-control" id="nama_album" placeholder="Masukkan Nama Album" name="nama_album" required>
										</div>

										<div class="mb-3">
											<label for="namasiswa" class="form-label">Deskripsi Album</label>
											<textarea class="form-control" id="deskripsi_album" rows="3" name="deskripsi_album" placeholder="Masukkan Deskripsi Album (Opsional)" style="height: 100px;"></textarea>
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