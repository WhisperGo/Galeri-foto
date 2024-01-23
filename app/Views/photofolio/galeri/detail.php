<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Detail Gambar</h2>
          <p>Di halaman ini anda dapat like, dan comment foto atau gambar yang sudah diupload.</p>

          <!-- <a href="javascript:void(0);" class="cta-btn">My Other Gallery</a> -->

        </div>
      </div>
    </div>
  </div><!-- End Page Header -->

  <!-- ======= Gallery Single Section ======= -->
  <section id="gallery-single" class="gallery-single">
    <div class="container">
     <?php foreach ($gambar_baru as $image): ?>
      <div class="position-relative h-100 text-center">
        <img src="<?= base_url('images/' . $image->nama_gambar) ?>" class="img-fluid mx-auto rounded" style="object-fit: cover; width: 75%; height: 75%;" alt="">
      </div>


      <div class="row justify-content-between gy-4 mt-4">

        <div class="col-lg-8">
          <div class="portfolio-description">
            <h2><?=$image->judul_gambar?></h2>
            <p>
              <?=$image->deskripsi_gambar?>
            </p>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="col-lg-3">
        <div class="portfolio-info">
          <h3>Image Menu</h3>
          <ul>

            <?php if ($isLiked): ?>
              <li><a href="<?= base_url('galeri/aksi_like/' . $image->id_gambar) ?>" class="btn-visit-danger align-self-start"><i class="faj-button fa-solid fa-heart"></i>Unlike</a></li>
            <?php else: ?>
              <li><a href="<?= base_url('galeri/aksi_like/' . $image->id_gambar) ?>" class="btn-visit align-self-start"><i class="faj-button fa-solid fa-heart"></i>Like</a></li>
            <?php endif; ?>

            <li><a href="#" class="btn-visit align-self-start"><i class="faj-button fa-solid fa-comment"></i>Comment</a></li>
            <li><a href="<?= base_url('images/' . $image->nama_gambar) ?>" class="btn-visit align-self-start" download><i class="faj-button fa-solid fa-download"></i>Download</a></li>
          </ul>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Gallery Single Section -->

  </main><!-- End #main -->