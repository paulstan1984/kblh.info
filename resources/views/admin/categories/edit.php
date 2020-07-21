<?php echo $header ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?php echo $id == 0 ? __('custom.add'):__('custom.edit')?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="admin">
                        <?php echo __('custom.home')?>
                    </a>
                </li>
                <li class="breadcrumb-item">
                  <a href="admin/categories">
                    <?php echo __('custom.categories')?>
                  </a>
                </li>
                <li class="breadcrumb-item active">
                    <?php echo $id == 0 ? __('custom.add'):__('custom.edit')?>
                </li>
            </ol>

            <div class="card mb-4">
              <form method="POST" action="admin/categories/edit/<?php echo $id?>">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <label><?php echo __('custom.name')?>: </label>
                      <input class="form-control" type="text" name="name" value="<?php echo old('name', $item->name)?>"/>
                        
                      <?php if($errors->get('name')) { ?>
                      <p class="text-danger">
                          <?php echo implode(',', $errors->get('name'));?>
                      </p>
                      <?php } ?>
                    </div>
                  </div>
                  

                </div>

                <div class="card-footer">

                  <a href="admin/categories" class="btn btn-secondary"><?php echo __('custom.cancel')?></a>
                  <button type="submit" class="btn btn-primary"><?php echo __('custom.save')?></button>

                  <?php if( $item->id > 0) {?>
                  <a class="btn btn-danger" href="admin/categories/delete/<?php echo $item->id?>" onclick="return confirm('Confirmați?')">
                      <i class="fas fa-trash"></i>
                      <?php echo __('custom.delete')?>
                  </a>
                  <?php }?>
                </div>
              </form>
            </div>
        </div>

    </main>

<?php echo $footer ?>
