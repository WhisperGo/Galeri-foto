<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Komentar</h2>
          <p>Di sini anda dapat berkomentar mengenai gambar yang telah diposting sebelumnya. Mohon tidak menggunakan kata-kata kasar.</p>

        </div>
      </div>
    </div>
  </div><!-- End Page Header -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <?php foreach ($gambar as $image): ?>
        <div class="position-relative h-100 text-center">
          <img src="<?= base_url('images/' . $image->nama_gambar) ?>" class="img-fluid mb-5 rounded" style="object-fit: cover; width: 50%; height: 50%;" alt="">
        </div>
        

        <div class="row justify-content-center mt-4">

          <!-- Tampilkan komentar -->
          <div class="mb-4">
            <h3 class="text-center">Area Komentar</h3>
            <?php foreach ($komentar as $k): ?>
              <p><strong><?= $k->username ?></strong>: <?= $k->isi_komentar ?></p>
            <?php endforeach; ?>
          </div>


          <!-- Formulir komentar -->
          <form action="<?=base_url('galeri/aksi_tambah_komentar/' . $image->id_gambar) ?>" method="post">

            <div class="row">
              <div class="form-group mt-3">
                <textarea class="form-control" name="isi_komentar" rows="5" placeholder="Silahkan Isi Komentar Anda" required></textarea>
              </div>
            </div>

            <div class="my-3">
              <?php if (session()->has('id')): ?>
              <div class="text-center"><button type="submit" class="btn btn-success">Kirim Komentar</button></div>
            <?php else: ?>
              <div class="text-center"><a href="<?= base_url('login')?>" class="btn btn-warning">Login untuk Komentar</a></div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </form>


    </div>
  </div>
</section><!-- End Contact Section -->
</main><!-- End #main -->