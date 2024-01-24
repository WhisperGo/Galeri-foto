<?php
$db         = \Config\Database::connect();

// $level      = session()->get('level');
// $on         = 'user.level=level.id_level';
// $namalevel  = $db->table('user')->join('level', $on, 'left')->where('level.id_level', $level)->get()->getRow();

$id_user = session()->get('id');
$user = $db->table('user')->where('id_user', $id_user)->get()->getRow();

?>

<style>
  .perfect-circle {
  width: 100px; /* Sesuaikan lebar sesuai kebutuhan Anda */
  height: 100px; /* Sesuaikan tinggi sesuai kebutuhan Anda */
  border-radius: 50%;
  overflow: hidden; /* Optional: agar kontennya tidak keluar dari lingkaran */
}
</style>

<main id="main" data-aos="fade" data-aos-delay="1500">

  <!-- ======= End Page Header ======= -->
  <div class="page-header d-flex align-items-center">
    <div class="container position-relative">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>Search Result</h2>
          <!-- <p>Silahkan cari user yang anda inginkan untuk melihat album dan foto yang diupload oleh mereka.</p> -->

        </div>
      </div>
    </div>
  </div><!-- End Page Header -->

  <!-- ======= Search Result Section ======= -->
  <section id="search-result" class="search-result">
    <div class="container">
      <div class="row justify-content-center mt-4">
        <div class="col-lg-9">

          <?php if (!empty($users)): ?>
            <div class="row">
              <?php foreach ($users as $user): ?>
                <div class="col-md-4 mb-4 text-center">
                  <?php
                  $foto_profil = (!empty($user->foto)) ? base_url('profile/' . $user->foto) : base_url('profile/default.png');
                  ?>

                  <a href="<?=base_url('album/detail_user/' . $user->id_user)?>"><img src="<?=$foto_profil?>" class="testimonial-img" style="width: 100px; height: 100px;">
                    <a href="<?=base_url('album/detail_user/' . $user->id_user)?>"><h6 class='mb-0 mt-2 text-gray-600'><?= $user->username ?></h6></a>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php else: ?>
              <p class="text-center">User tidak ditemukan.</p>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </section><!-- End Search Result Section -->

  </main><!-- End #main -->


  </main><!-- End #main -->