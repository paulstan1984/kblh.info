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
          <h2><?php echo __('custom.books') ?></h2>
          <ol>
            <li><a href="<?php echo env('BASE_URL') ?>">Home</a></li>
            <li><?php echo __('custom.books') ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">

      <div class="container">

        <div class="row">
          <h2 class="col-12 p-0"><?php echo __('custom.search') ?></h2>
          <form class="col-12 p-0 mb-3 form-row" method="GET" action="<?php echo paginatedQuery('books', $results, ['page' => 1]) ?>">
            <div class="col-auto">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-search-plus"></i></div>
                </div>
                <input class="form-control" type="text" name="title" value="<?php echo old('title', $results->title) ?>" placeholder="<?php echo __('custom.title') ?>" />
              </div>
            </div>
            <div class="col-auto">
              <input class="btn btn-primary" type="submit" value="<?php echo __('custom.search') ?>" />
            </div>
          </form>
        </div>
      </div>

      <div class="container">
        <?php if (count($results->results) > 0) { ?>
          <div class="row">
            <?php foreach ($results->results as $item) { ?>
              <div class="card col-xs-12 col-md-4">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $item->title ?></h5>
                  <p class="card-text"><?php echo strip_tags($item->description) ?></p>

                  <?php if ($item->authors->count() > 0) { ?>
                    <p>
                      <?php foreach ($item->authors as $author) { ?>
                        <span class="badge badge-secondary"><?php echo $author->name ?></span>
                      <?php } ?>
                    </p>
                  <?php } ?>
                  <a href="#" class="btn btn-primary"><?php echo __('custom.details') ?></a>
                </div>
              </div>
            <?php } ?>
          </div>
        <?php } else { ?>
          <div class="row">
            <p class="col-12 p-0"><?php echo __('custom.nodata') ?></p>
          </div>
        <?php } ?>
      </div>
    </section>

  </main><!-- End #main -->
  <?php echo $footer ?>

</body>

</html>