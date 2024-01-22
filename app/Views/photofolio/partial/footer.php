<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>GaleriFoto</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/ -->
      Designed by <a href="">Kevin Fernando</a>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- <div id="preloader">
  <div class="line"></div>
</div> -->

<!-- Vendor JS Files -->
<script src="<?=base_url('@photofolio/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?=base_url('@photofolio/assets/vendor/swiper/swiper-bundle.min.js')?>"></script>
<script src="<?=base_url('@photofolio/assets/vendor/glightbox/js/glightbox.min.js')?>"></script>
<script src="<?=base_url('@photofolio/assets/vendor/aos/aos.js')?>"></script>
<script src="<?=base_url('@photofolio/assets/vendor/php-email-form/validate.js')?>"></script>

<!-- Template Main JS File -->
<script src="<?=base_url('@photofolio/assets/js/main.js')?>"></script>

<!-- Log Out Otomatis -->
    <script>
      // Fungsi untuk mengatur timer otomatis logout
      function startLogoutTimer() {
        let timeoutId;

        function resetTimer() {
          clearTimeout(timeoutId);
          timeoutId = setTimeout(logout, 30 * 60 * 1000); //30 Menit
        }

        function logout() {
          window.location.href = '<?= base_url('login/log_out') ?>';
        }

        // Resep timer setiap kali ada aktivitas
        window.addEventListener('mousemove', resetTimer);
        window.addEventListener('click', resetTimer);
        window.addEventListener('keypress', resetTimer);
        resetTimer();
      }

      // Panggil fungsi untuk memulai timer otomatis logout
      startLogoutTimer();
    </script>
    <!-- Log Out Otomatis -->

</body>

</html>