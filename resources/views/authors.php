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
          <h2><?php echo __('custom.authors') ?></h2>
          <ol>
            <li><a href="<?php echo env('BASE_URL') ?>"><?php echo __('custom.home') ?></a></li>
            <li><?php echo __('custom.authors') ?></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page pt-4">

      <div class="container">

        <div class="row">
          <h2 class="col-12 p-0"><?php echo __('custom.search') ?></h2>
          <form class="col-12 p-0 mb-3 form-row" method="GET" action="<?php echo paginatedQuery('authors', $results, ['page' => 1]) ?>">
            <div class="col-7 col-md-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-search-plus"></i></div>
                </div>
                <input class="form-control" type="text" name="name" value="<?php echo old('name', $results->name) ?>" placeholder="<?php echo __('custom.name') ?>" />
              </div>
            </div>
            <div class="col-5 col-md-9">
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
                  <h5 class="card-title"><?php echo $item->name ?></h5>
                  <?php if ($item->books->count() > 0) { ?>
                    <ul class="ml-0 pl-0 list-inline">
                      <?php foreach ($item->books as $book) { ?>
                        <li><a href="<?php echo env('R_BOOK') . '/' . $book->id ?>"><?php echo $book->title ?></a></li>
                      <?php } ?>
                    </ul>
                  <?php } ?>
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