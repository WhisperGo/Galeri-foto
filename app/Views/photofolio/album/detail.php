<?php 

$uri = service('uri');

?>

<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <!-- Gunakan nama_album yang sudah diambil dari controller -->
          <h2><?= $nama_album ?></h2>
          <p><?= $deskripsi_album ?></p>

          <a href="javascript:history.back()" class="cta-btn mt-3">Back</a>

          <?php if ($isAlbumOwner): ?>
            <a href="<?= base_url('album/tambah_gambar') ?>" class="cta-btn">Add New Image</a>
            <a href="<?= base_url('album/hapus_album/' . $uri->getSegment(3)) ?>" class="cta-btn-danger">Delete This Album</a>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div><!-- End Page Header -->




  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">
    <div class="container-fluid">
      <div class="row gy-4 justify-content-center">
        <?php foreach ($gambar_album as $gambar): ?>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
              <img src="<?= base_url('images/' . $gambar->nama_gambar) ?>" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" alt="">
              <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="<?= base_url('galeri/detail_gambar/' . $gambar->id_gambar) ?>" class="details-link"><i class="fa-solid fa-circle-info"></i></a>
                <span><?=$gambar->judul_gambar?></span>
              </div>
            </div>
          </div><!-- End Gallery Item -->
        <?php endforeach; ?>
      </div>
    </div>
  </section><!-- End Gallery Section -->

  </main><!-- End #main -->