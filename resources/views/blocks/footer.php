<!-- ======= Footer ======= -->
<footer id="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6 footer-contact">
          <h3><?php echo __('custom.siteTitle')?></h3>
          <p>
          <?php echo __('custom.about_us_description')?>
          </p>
        </div>

        <div class="col-lg-4 col-md-6 footer-links">
          <h4><?php echo __('custom.usefull_links')?></h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i><a href="#top"><?php echo __('custom.home');?></a></li>
            <li><i class="bx bx-chevron-right"></i><a href="#about"><?php echo __('custom.books');?></a></li>
            <li><i class="bx bx-chevron-right"></i><a href="#services"><?php echo __('custom.authors');?></a></li>
            <li><i class="bx bx-chevron-right"></i><a href="#portfolio"><?php echo __('custom.categories');?></a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-6 footer-newsletter">
          <h4><?php echo __('custom.newsletter')?></h4>
          <p><?php echo __('custom.newsletter_description')?></p>
          <form action="" method="post">
            <input type="email" name="email"><input type="submit" value="<?php echo __('custom.subscribe')?>">
          </form>
        </div>

      </div>
    </div>
  </div>

  <div class="container d-md-flex py-4">

    <div class="mr-md-auto text-center text-md-left">
      <div class="copyright">
        &copy; <strong><span><?php echo __('custom.siteTitle')?></span></strong>.
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
        <?php echo __('custom.designedby')?>: <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
    <div class="social-links text-center text-md-right pt-3 pt-md-0">
      <a target="_blank" href="<?php echo env('fb_url')?>" class="facebook"><i class="bx bxl-facebook"></i></a>
      <a target="_blank" href="<?php echo env('yt_url')?>" class="youtube"><i class="bx bxl-youtube"></i></a>
      <a target="_blank" href="<?php echo env('insta_url')?>" class="instagram"><i class="bx bxl-instagram"></i></a>
      <a target="_blank" href="<?php echo env('sc_url')?>" class="soundcloud"><i class="bx bxl-soundcloud"></i></a>
    </div>
  </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
