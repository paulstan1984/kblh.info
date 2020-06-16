<?php echo $header ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?php echo __('custom.editpassword')?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="admin">
                        <?php echo __('custom.home')?>
                    </a>
                </li>
                <li class="breadcrumb-item">
                  <a href="admin/users">
                    <?php echo __('custom.users')?>
                  </a>
                </li>
                <li class="breadcrumb-item">
                  <a href="admin/users/edit/<?php echo $id?>">
                    <?php echo __('custom.edit')?>
                  </a>
                </li>
                <li class="breadcrumb-item active">
                  <?php echo __('custom.editpassword')?>
                </li>
            </ol>

            <div class="card mb-4">
              <div class="card-header">
                <h2><?php echo __('custom.editpasswordfor') ?> <?php echo $item['firstname'].' '.$item['lastname']?></h2>
              </div>

              <form method="POST" action="admin/users/changepassword/<?php echo $id?>">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-4">
                      <label><?php echo __('custom.password')?>: </label>
                      <input class="form-control" type="password" name="password"/>
                        
                      <?php if($errors->get('password')) { ?>
                      <p class="text-danger">
                          <?php echo implode(',', $errors->get('password'));?>
                      </p>
                      <?php } ?>

                      <label><?php echo __('custom.repassword')?>: </label>
                      <input class="form-control" type="password" name="repassword">
                      <?php if($errors->get('repassword')) { ?>
                      <p class="text-danger">
                          <?php echo implode(',', $errors->get('repassword'));?>
                      </p>
                      <?php } ?>
                    </div>
                  </div>
                  

                </div>

                <div class="card-footer">

                  <a href="admin/users" class="btn btn-secondary"><?php echo __('custom.cancel')?></a>
                  <button type="submit" class="btn btn-primary"><?php echo __('custom.save')?></button>

                </div>
              </form>
            </div>
        </div>

    </main>

<?php echo $footer ?>
