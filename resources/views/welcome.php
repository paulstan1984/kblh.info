<!DOCTYPE html>
<html lang="ro">
<?php echo $head?>
<body id="top">

  <?php echo $header?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
      <div class="row justify-content-center">
        <div class="col-xl-7 col-lg-9 text-center">
          <h1><?php echo __('custom.siteTitle')?></h1>
        </div>
      </div>
      <div class="text-center">
        <a href="#mainsections" class="btn-get-started scrollto"><?php echo __('custom.letsstart')?></a>
      </div>

      <div class="row icon-boxes" id="mainsections">
        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="ri-stack-line"></i></div>
            <h4 class="title"><a href="<?php echo env('R_BOOKS')?>"><?php echo __('custom.books')?></a></h4>
            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box">
            <div class="icon"><i class="ri-palette-line"></i></div>
            <h4 class="title"><a href="<?php echo env('R_AUTHORS')?>"><?php echo __('custom.authors')?></a></h4>
            <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
          </div>
        </div>

        <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
          <div class="icon-box">
            <div class="icon"><i class="ri-command-line"></i></div>
            <h4 class="title"><a href=""><?php echo __('custom.categories')?></a></h4>
            <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
          </div>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2><?php echo __('custom.about_us_title')?></h2>
          <p><?php echo __('custom.about_us_description')?></p>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row justify-content-end">

          <div class="col-lg-4 col-md-4 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up"><?php echo $counters->nrBooks?></span>
              <p><?php echo __('custom.books')?></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up"><?php echo $counters->nrAuthors?></span>
              <p><?php echo __('custom.authors')?></p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <span data-toggle="counter-up"><?php echo $counters->nrCategories?></span>
              <p><?php echo __('custom.categories')?></p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Counts Section -->

  </main><!-- End #main -->

  <?php echo $footer?>

</body>

</html>