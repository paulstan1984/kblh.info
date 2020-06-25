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
          <a href="admin/books">
            <?php echo __('custom.books') ?>
          </a>
        </li>
        <li class="breadcrumb-item">
          <a href="admin/books/edit/<?php echo $book->id ?>">
            <?php echo $book->title ?>
          </a>
        </li>

        <?php foreach ($parents as $parent) { ?>
          <li class="breadcrumb-item">
            <a href="admin/books/<?php echo $parent->bookid ?>/chapters/<?php echo $parent->id ?>/<?php echo $parent->parentid ?>">
              <?php echo $parent->title ?>
            </a>
          </li>
        <?php } ?>

        <li class="breadcrumb-item active">
          <?php echo $id == 0 ? __('custom.add') . ' ' . __('custom.chapter') : __('custom.edit') . ' ' . $item->title ?>
        </li>
      </ol>

      <?php if (!empty($msg)) { ?>
        <div class="alert alert-info" role="alert">
          <?php echo __('custom.' . $msg) ?>
        </div>
      <?php } ?>

      <?php if (!empty($errmsg)) { ?>
        <div class="alert alert-danger" role="alert">
          <?php echo __('custom.' . $errmsg) ?>
        </div>
      <?php } ?>

      <div class="card mb-4">
        <form method="POST" action="admin/books/<?php echo $book->id ?>/chapters/<?php echo $id ?>/<?php echo $parentid ?>">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-md-7">
                <label><?php echo __('custom.title') ?>: </label>
                <input class="form-control" type="text" name="title" value="<?php echo old('title', $item->title) ?>" />

                <?php if ($errors->get('title')) { ?>
                  <p class="text-danger">
                    <?php echo implode(',', $errors->get('title')); ?>
                  </p>
                <?php } ?>

                <label><?php echo __('custom.position') ?>: </label>
                <input class="form-control" type="text" name="position" value="<?php echo old('position', $item->position) ?>" />

                <?php if ($errors->get('position')) { ?>
                  <p class="text-danger">
                    <?php echo implode(',', $errors->get('position')); ?>
                  </p>
                <?php } ?>

                <label><?php echo __('custom.description') ?>: </label>
                <textarea rows="10" class="form-control" name="description"><?php echo old('description', $item->description) ?></textarea>
                <?php if ($errors->get('description')) { ?>
                  <p class="text-danger">
                    <?php echo implode(',', $errors->get('description')); ?>
                  </p>
                <?php } ?>
              </div>

            </div>

            <div class="row">
              <h2 class="col-12"><?php echo __('custom.subsections') ?></h2>

              <?php if ($item->subsections->count() > 0) { ?>
                <div class="col-12 table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><?php echo __('custom.title') ?></th>
                        <th><?php echo __('custom.position') ?></th>
                        <th><?php echo __('custom.actions') ?></th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th><?php echo __('custom.title') ?></th>
                        <th><?php echo __('custom.position') ?></th>
                        <th><?php echo __('custom.actions') ?></th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php foreach ($item->subsections as $subsection) { ?>
                        <tr <?php echo $selected_section == $subsection->id ? 'class="alert alert-primary"' : '' ?>>
                          <td><?php echo $subsection->title ?></td>
                          <td><?php echo $subsection->position ?></td>
                          <td>
                            <a class="btn btn-primary" href="admin/books/<?php echo $item->bookid ?>/chapters/<?php echo $subsection->id ?>/<?php echo $subsection->parentid ?>">
                              <i class="fas fa-edit"></i>
                              <?php echo __('custom.edit') ?>
                            </a>

                            <a class="btn btn-danger" href="admin/books/<?php echo $item->bookid ?>/deletechapter/<?php echo $subsection->id ?>" onclick="return confirm('Confirmați?')">
                              <i class="fas fa-trash"></i>
                              <?php echo __('custom.delete') ?>
                            </a>


                            <a class="btn" href="admin/booksection/<?php echo $subsection->id ?>/up">
                              <i class="fas fa-arrow-up"></i>
                            </a>

                            <a class="btn" href="admin/booksection/<?php echo $subsection->id ?>/down">
                              <i class="fas fa-arrow-down"></i>
                            </a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>


                </div>
              <?php } else { ?>
                <p class="col-12"><?php echo __('custom.nodata') ?></p>
              <?php } ?>
            </div>
          </div>

          <div class="card-footer">
            <?php if ($item->parentid == 0) { ?>
              <a href="admin/books/edit/<?php echo $book->id ?>" class="btn btn-secondary"><?php echo __('custom.cancel') ?></a>
            <?php } else { ?>
              <a href="admin/books/<?php echo $item->bookid ?>/chapters/<?php echo $item->parentid ?>/0" class="btn btn-secondary"><?php echo __('custom.cancel') ?></a>
            <?php } ?>


            <?php if ($id > 0) { ?>
              <a href="admin/books/<?php echo $item->bookid ?>/chapters/0/<?php echo $item->id ?>" class="btn btn-info"><?php echo __('custom.addchapter') ?></a>
            <?php } ?>
            <button type="submit" class="btn btn-primary"><?php echo __('custom.save') ?></button>
          </div>
        </form>
      </div>
    </div>

  </main>

  <?php echo $footer ?>