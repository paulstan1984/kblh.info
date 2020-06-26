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
        <li class="breadcrumb-item active">
          <?php echo $id == 0 ? __('custom.add') : __('custom.edit') ?>
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
        <form method="POST" action="admin/books/edit/<?php echo $id ?>">
          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12 col-md-7">
                <h2><?php echo __('custom.bookdetails') ?></h2>
                <label><?php echo __('custom.title') ?>: </label>
                <input class="form-control" type="text" name="title" value="<?php echo old('title', $item->title) ?>" />

                <?php if ($errors->get('title')) { ?>
                  <p class="text-danger">
                    <?php echo implode(',', $errors->get('title')); ?>
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

              <div class="col-sm-12 col-md-5">
                <h2><?php echo __('custom.authors') ?></h2>
                <label><?php echo __('custom.typeauthorname') ?>: </label>
                <input type="text" id="authors" class="form-control" data-bookid="<?php echo $item->id?>"/>

                <?php if ($item->authors->count() > 0) { ?>
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th><?php echo __('custom.name') ?></th>
                          <th><?php echo __('custom.actions') ?></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th><?php echo __('custom.name') ?></th>
                          <th><?php echo __('custom.actions') ?></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php foreach ($item->authors as $author) { ?>
                          <tr>
                            <td><a href="admin/authors/edit/<?php echo $author->id?>"><?php echo $author->name ?></a></td>
                            <td>
                              <a class="btn btn-danger" href="admin/books/<?php echo $item->id ?>/unassignauthor/<?php echo $author->id ?>" onclick="return confirm('Confirmați?')">
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
            </div>

            <div class="row">
              <h2 class="col-12"><?php echo __('custom.chapters') ?></h2>

              <?php if ($item->chapters->count() > 0) { ?>
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
                      <?php foreach ($item->chapters as $chapter) { ?>
                        <tr <?php echo $selected_section == $chapter->id ? 'class="alert alert-primary"' : '' ?>>
                          <td><?php echo $chapter->title ?></td>
                          <td><?php echo $chapter->position ?></td>
                          <td>
                            <a class="btn btn-primary" href="admin/books/<?php echo $item->id ?>/chapters/<?php echo $chapter->id ?>/0">
                              <i class="fas fa-edit"></i>
                              <?php echo __('custom.edit') ?>
                            </a>

                            <a class="btn btn-danger" href="admin/books/<?php echo $item->id ?>/deletechapter/<?php echo $chapter->id ?>" onclick="return confirm('Confirmați?')">
                              <i class="fas fa-trash"></i>
                              <?php echo __('custom.delete') ?>
                            </a>


                            <a class="btn" href="admin/booksection/<?php echo $chapter->id ?>/up">
                              <i class="fas fa-arrow-up"></i>
                            </a>

                            <a class="btn" href="admin/booksection/<?php echo $chapter->id ?>/down">
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

            <a href="admin/books" class="btn btn-secondary"><?php echo __('custom.cancel') ?></a>
            <a href="admin/books/<?php echo $item->id ?>/chapters/0/0" class="btn btn-info"><?php echo __('custom.addchapter') ?></a>
            <button type="submit" class="btn btn-primary"><?php echo __('custom.save') ?></button>
          </div>
        </form>
      </div>
    </div>

  </main>

  <?php echo $footer ?>