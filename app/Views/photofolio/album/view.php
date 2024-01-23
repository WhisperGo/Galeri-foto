<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>My Album</h2>
          <p>Odio et unde deleniti. Deserunt numquam exercitationem. Officiis quo odio sint voluptas consequatur ut a odio voluptatem. Sit dolorum debitis veritatis natus dolores. Quasi ratione sint. Sit quaerat ipsum dolorem.</p>

          <a href="<?= base_url('album/tambah_album') ?>" class="cta-btn">Add Album</a>

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
              <img src="<?= base_url('cover/' . $image->gambar_album) ?>" class="img-fluid" alt="">
              <div class="gallery-links d-flex align-items-center justify-content-center">
                <a href="<?=base_url('album/detail_album/' . $image->id_gambar)?>" class="details-link"><i class="fa-solid fa-album-collection"></i>

                <span><?=$image->nama_album?></span>
                </a>

              </div>
            </div>
          </div><!-- End Gallery Item -->
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <!-- End Gallery Section -->

  </main><!-- End #main -->