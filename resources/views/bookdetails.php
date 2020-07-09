<!DOCTYPE html>
<html lang="ro">
<?php echo $head ?>

<body>

  <?php echo $header ?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $item->title ?></h2>
          <ol>
            <li><a href="<?php echo env('BASE_URL') ?>"><?php echo __('custom.home') ?></a></li>
            <li><a href="<?php echo env('R_BOOKS') ?>"><?php echo __('custom.books') ?></a></li>
            <li><?php echo $item->title ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">

      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-4 bd-sidebar">
            <ul class="nav flex-column">
              <?php foreach($item->chapters as $chapter){?>
                <?php echo chapter_menu($chapter) ?>
              <?php } ?>
            </ul>
          </div>

          <div class="col-xs-12 col-md-8">
            <?php echo $item->description ?>

            <?php foreach($item->chapters as $chapter){?>
              <?php echo chapter_description($chapter) ?>
            <?php }?>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php echo $footer ?>

</body>

</html>