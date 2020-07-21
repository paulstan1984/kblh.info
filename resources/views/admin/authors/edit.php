<?php echo $header ?>

<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <h1 class="mt-4"><?php echo $id == 0 ? __('custom.add') : __('custom.edit') ?></h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
          <a href="admin">
            <?php echo __('custom.home') ?>
          </a>
        </li>
        <li class="breadcrumb-item">
          <a href="admin/authors">
            <?php echo __('custom.authors') ?>
          </a>
        </li>
        <li class="breadcrumb-item active">
          <?php echo $id == 0 ? __('custom.add') : __('custom.edit') ?>
        </li>
      </ol>

      <div class="card mb-4">
        <form method="POST" action="admin/authors/edit/<?php echo $id ?>">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-md-4">
                <h2><?php echo __('custom.authordetails') ?></h2>
                <label><?php echo __('custom.name') ?>: </label>
                <input class="form-control" type="text" name="name" value="<?php echo old('name', $item->name) ?>" />

                <?php if ($errors->get('name')) { ?>
                  <p class="text-danger">
                    <?php echo implode(',', $errors->get('name')); ?>
                  </p>
                <?php } ?>
              </div>

              <?php if( $item->id > 0) {?>
              <div class="col-sm-12 col-md-8">
                <h2><?php echo __('custom.books') ?></h2>
                <label><?php echo __('custom.typebookname') ?>: </label>
                <input type="text" id="books" class="form-control" data-authorid="<?php echo $item->id ?>" />

                <?php if ($item->books->count() > 0) { ?>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><?php echo __('custom.name') ?></th>
                          <th><?php echo __('custom.description') ?></th>
                          <th><?php echo __('custom.actions') ?></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                        <th><?php echo __('custom.name') ?></th>
                          <th><?php echo __('custom.description') ?></th>
                          <th><?php echo __('custom.actions') ?></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php foreach ($item->books as $book) { ?>
                          <tr>
                            <td><a href="admin/books/edit/<?php echo $book->id ?>"><?php echo $book->title ?></a></td>
                            <td><?php echo substr($book->description, 0, 200) ?></td>
                            <td nowrap>
                              <a class="btn btn-danger" href="admin/authors/<?php echo $item->id ?>/unassignbook/<?php echo $book->id ?>" onclick="return confirm('Confirmați?')">
                                <i class="fas fa-trash"></i>
                                <?php echo __('custom.delete') ?>
                              </a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>


                  </div>
                <?php } else { ?>
                  <p><?php echo __('custom.nodata') ?></p>
                <?php } ?>

              </div>
              <?php }?>
            </div>


          </div>

          <div class="card-footer">

            <a href="admin/authors" class="btn btn-secondary"><?php echo __('custom.cancel') ?></a>
            <button type="submit" class="btn btn-primary"><?php echo __('custom.save') ?></button>
            <?php if( $item->id > 0) {?>
            <a class="btn btn-danger" href="admin/authors/delete/<?php echo $item->id?>" onclick="return confirm('Confirmați?')">
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