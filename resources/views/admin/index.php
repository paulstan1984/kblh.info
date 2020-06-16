<?php echo $header ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?php echo __('custom.home')?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"><?php echo __('custom.home')?></li>
            </ol>

            <?php if(!empty($msg)) {?>
            <div class="alert alert-info" role="alert">
                <?php echo __('custom.'.$msg)?>
            </div>
            <?php }?>

            <?php if(!empty($errmsg)){?>
            <div class="alert alert-danger" role="alert">
                <?php echo __('custom.'.$errmsg)?>
            </div>
            <?php }?>

            <div class="row">
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-primary text-white mb-4">
                      <div class="card-body">
                        <i class="fas fa-user-friends"></i>
                        <?php echo $counters->nrAuthors?> <?php echo __('custom.authors')?>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                          <a class="small text-white stretched-link" href="admin/authors"><?php echo __('custom.details')?></a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-warning text-white mb-4">
                      <div class="card-body">
                        <i class="fas fa-book-open"></i>
                        <?php echo $counters->nrBooks?> <?php echo __('custom.books')?>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                          <a class="small text-white stretched-link" href="admin/books"><?php echo __('custom.details')?></a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-success text-white mb-4">
                      <div class="card-body">
                        <i class="fas fa-list"></i>
                        <?php echo $counters->nrCategories?> <?php echo __('custom.categories')?>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                          <a class="small text-white stretched-link" href="admin/categories"><?php echo __('custom.details')?></a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-md-6">
                  <div class="card bg-danger text-white mb-4">
                      <div class="card-body">
                        <i class="fas fa-user"></i>
                        <?php echo $counters->nrUsers?> <?php echo __('custom.users')?>
                      </div>
                      <div class="card-footer d-flex align-items-center justify-content-between">
                          <a class="small text-white stretched-link" href="admin/users"><?php echo __('custom.details')?></a>
                          <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                      </div>
                  </div>
              </div>
          </div>

        </div>
    </main>

<?php echo $footer ?>
