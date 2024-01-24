<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Search User</h2>
          <p>Silahkan cari user yang anda inginkan untuk melihat album dan foto yang diupload oleh mereka.</p>

        </div>
      </div>
    </div>
  </div><!-- End Page Header -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <!-- Formulir komentar -->
      <form action="<?=base_url('album/aksi_cari_user') ?>" method="post">

        <div class="row">
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="search_user" placeholder="Ketik Username yang dicari" required>
          </div>
        </div>

        <div class="my-3">
          <div class="text-center"><button type="submit" class="btn btn-success">Cari User</button></div>
      </div>
    </form>


  </div>
</div>
</section><!-- End Contact Section -->
</main><!-- End #main -->