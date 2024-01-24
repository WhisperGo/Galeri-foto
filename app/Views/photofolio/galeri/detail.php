<?php 

$uri = service('uri');

?>

<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Detail Gambar</h2>
          <p>Di halaman ini anda dapat like, dan comment foto atau gambar yang sudah diupload.</p>


          <a href="javascript:history.back()" class="cta-btn mt-3">Back</a>

          <?php foreach ($gambar_baru as $image): ?>
            <?php if ($image->user == session()->get('id')) : ?>
            <a href="<?= base_url('album/hapus_gambar/' . $uri->getSegment(3)) ?>" class="cta-btn-danger mt-3">Delete This Image</a>
          <?php endif; ?>

        </div>
      </div>
    </div>
  </div><!-- End Page Header -->

  <!-- ======= Gallery Single Section ======= -->
  <section id="gallery-single" class="gallery-single">
    <div class="container">

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
            <?php if (session()->has('id')): ?>

            <?php if ($isLiked): ?>
              <li><a href="<?= base_url('galeri/aksi_like/' . $image->id_gambar) ?>" class="btn-visit-danger align-self-start"><i class="faj-button fa-solid fa-heart"></i>Unlike (<?= $likeCount ?>)</a></li>
            <?php else: ?>
              <li><a href="<?= base_url('galeri/aksi_like/' . $image->id_gambar) ?>" class="btn-visit align-self-start"><i class="faj-button fa-solid fa-heart"></i>Like (<?= $likeCount ?>)</a></li>
            <?php endif; ?>

          <?php else: ?>
            <!-- Tambahkan atribut data-toggle dan data-target untuk membuka modal saat klik -->
            <li><a href="#" class="btn-visit align-self-start" data-toggle="modal" data-target="#loginModal"><i class="faj-button fa-solid fa-heart"></i>Like (<?= $likeCount ?>)</a></li>
          <?php endif; ?>

          <li><a href="<?=base_url('galeri/komentar/' . $image->id_gambar)?>" class="btn-visit align-self-start"><i class="faj-button fa-solid fa-comment"></i>Comment</a></li>

          <li><a href="<?= base_url('images/' . $image->nama_gambar) ?>" class="btn-visit align-self-start" download><i class="faj-button fa-solid fa-download"></i>Download</a></li>
        </ul>
      </div>
    </div>

    <!-- Modal untuk pesan "Harap Login Terlebih Dahulu" -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content bg-black"> <!-- Tambahkan kelas "bg-black" untuk warna hitam -->
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Harap Login Terlebih Dahulu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Silakan login terlebih dahulu untuk memberi like.</p>
          </div>
          <div class="modal-footer">
            <a href="<?= base_url('login') ?>" class="btn btn-primary">Login</a>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
</section><!-- End Gallery Single Section -->

</main><!-- End #main -->

<style>
  .bg-black {
    background-color: #000 !important; /* Gunakan "!important" untuk mengatasi pengaruh lainnya */
  }

  .modal-content {
    color: #fff; /* Ganti warna teks menjadi putih atau warna yang sesuai */
  }
</style>

<script>
  $(document).ready(function () {
        // Sembunyikan modal saat halaman dimuat
    $('#loginModal').modal('hide');
  });
</script>