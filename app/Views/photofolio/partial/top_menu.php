<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid d-flex align-items-center justify-content-between">

    <a href="<?=base_url('/')?>" class="logo d-flex align-items-center  me-auto me-lg-0">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="<?=base_url('@photofolio/assets/img/logo.png')?>" alt=""> -->
      <i class="bi bi-camera"></i>
      <h1>Galeri Foto</h1>
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a href="<?=base_url('/')?>" class="active">Home</a></li>
        <!-- <li><a href="about.html">About</a></li> -->
        <li class="dropdown"><a href="javascript:void(0);"><span>Gallery</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
          <ul>
            <li><a href="<?=base_url('galeri')?>">Alam</a></li>
            <li><a href="<?=base_url('galeri')?>">Arsitektur</a></li>
            <li><a href="<?=base_url('galeri')?>">Model</a></li>
            <!-- <li><a href="gallery.html">Architecture</a></li>
            <li><a href="gallery.html">Sports</a></li>
            <li><a href="gallery.html">Travel</a></li>
            <li class="dropdown"><a href="#"><span>Sub Menu</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
              <ul>
                <li><a href="#">Sub Menu 1</a></li>
                <li><a href="#">Sub Menu 2</a></li>
                <li><a href="#">Sub Menu 3</a></li>
              </ul>
            </li> -->
          </ul>
        </li>
        <!-- <li><a href="services.html">Services</a></li> -->
        <li><a href="<?=base_url('galeri/tambah_gambar')?>">Add Posts</a></li>
        <?php if(session()->has('id')): ?>
            <li><a href="<?= base_url('login/log_out') ?>">Log Out</a></li>
        <?php else: ?>
            <li><a href="<?= base_url('login') ?>">Login</a></li>
        <?php endif; ?>

      </ul>
    </nav><!-- .navbar -->

    <div class="header-social-links">
      <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
      <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
      <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
      <!-- <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a> -->
    </div>
    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
    <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

  </div>
</header><!-- End Header -->