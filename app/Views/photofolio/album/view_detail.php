<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <?php foreach ($users as $user): ?>
            <h2><?= $user->username ?>'s Album</h2>
            <p>Di sini terletak album <?= $user->username ?>, dimana anda dapat melihat foto dan album yang telah di upload oleh <?= $user->username ?>.</p>
          <?php endforeach; ?>

          <!-- <a href="<?= base_url('album/tambah_album') ?>" class="cta-btn">Add Album</a> --> 

          <a href="javascript:history.back()" class="cta-btn mt-3">Back</a>

        </div>
      </div>
    </div>
  </div><!-- End Page Header -->

  <!-- ======= Gallery Section ======= -->
  <section id="gallery" class="gallery">
    <div class="container-fluid">
      <div class="row gy-4 justify-content-center">
        <?php foreach ($album as $image): ?>
          <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="gallery-item h-100">
              <img src="<?= base_url('cover/' . $image->gambar_album) ?>" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;" alt="">
              <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="<?=base_url('album/detail_album/' . $image->id_album)?>" class="details-link"><i class="fa-solid fa-album-collection"></i></a>
                <span><?=$image->nama_album?></span>
              </div>
            </div>
          </div><!-- End Gallery Item -->
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- End Gallery Section -->



  </main><!-- End #main -->