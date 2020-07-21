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

        <a class="btn btn-primary float-sm-right" href="<?php echo env('R_BOOK') . '/' . $item->id . '/generate-pdf' ?>">
          <i class="fas fa-file-download"></i> PDF
        </a>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">

      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-4 bd-sidebar">
            <ul class="nav flex-column">
              <?php foreach ($item->chapters as $chapter) { ?>
                <?php echo chapter_menu($chapter) ?>
              <?php } ?>
            </ul>
          </div>

          <div class="col-xs-12 col-md-8">
            <?php echo $item->description ?>

            <?php 
              $next = [];
              for($i=1;$i<count($item->chapters);$i++) { 
                $next[]=$item->chapters[$i]->id;
              }
              $next[]=null;

              $prev = [null];
              for($i=0;$i<count($item->chapters)-1;$i++) { 
                $prev[]=$item->chapters[$i]->id;
              }
            ?>

            <?php for ($i=0;$i<count($item->chapters);$i++) { $chapter = $item->chapters[$i]; ?>
              <div class="row">
                <div class="col-sm-12">
                  <a class="btn btn-primary float-sm-right" href="<?php echo env('R_BOOKCHAPTER').'/'.$chapter->id.'/generate-pdf' ?>">
                    <i class="fas fa-file-download"></i> PDF
                  </a>
              
                  <?php echo chapter_description($chapter) ?>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12">
                  <?php if($prev[$i]!=null){?>
                  <a class="btn btn-primary float-sm-left" href="<?php echo env('R_BOOK').'/'.$chapter->bookid . '#chapter-' . $prev[$i] ?>">
                    <i class="fas fa-long-arrow-alt-left"></i> <?php echo __('custom.prev')?>
                  </a>
                  <?php } ?>

                  <?php if($next[$i]!=null){?>
                  <a class="btn btn-primary float-sm-right" href="<?php echo env('R_BOOK').'/'.$chapter->bookid . '#chapter-' . $next[$i] ?>"">
                    <?php echo __('custom.next')?> <i class="fas fa-long-arrow-alt-right"></i>
                  </a>
                  <?php } ?>
                </div>
              </div>
              <hr/>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <?php echo $footer ?>
  <script type="text/javascript">
    $('#header').removeClass('fixed-top');
  </script>
</body>

</html>