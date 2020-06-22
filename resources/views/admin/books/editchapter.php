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
                  <a href="admin/books">
                    <?php echo __('custom.books')?>
                  </a>
                </li>
                <li class="breadcrumb-item">
                  <a href="admin/books/edit/<?php echo $book->id?>">
                    <?php echo $book->title?>
                  </a>
                </li>
                <li class="breadcrumb-item active">
                    <?php echo $id == 0 ? __('custom.add'):__('custom.edit')?> <?php echo __('custom.chapter')?>
                </li>
            </ol>

            <div class="card mb-4">
              <form method="POST" action="admin/books/<?php echo $book->id?>/chapters/<?php echo $id?>/<?php echo $parentid?>">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-7">
                      <label><?php echo __('custom.title')?>: </label>
                      <input class="form-control" type="text" name="title" value="<?php echo old('title', $item->title)?>"/>
                        
                      <?php if($errors->get('title')) { ?>
                      <p class="text-danger">
                          <?php echo implode(',', $errors->get('title'));?>
                      </p>
                      <?php } ?>

                      <label><?php echo __('custom.position')?>: </label>
                      <input class="form-control" type="text" name="position" value="<?php echo old('position', $item->position)?>"/>
                        
                      <?php if($errors->get('position')) { ?>
                      <p class="text-danger">
                          <?php echo implode(',', $errors->get('position'));?>
                      </p>
                      <?php } ?>

                      <label><?php echo __('custom.description')?>: </label>
                      <textarea rows="10" class="form-control" name="description"><?php echo old('description', $item->description)?></textarea>
                      <?php if($errors->get('description')) { ?>
                      <p class="text-danger">
                          <?php echo implode(',', $errors->get('description'));?>
                      </p>
                      <?php } ?>
                    </div>

                  </div>
                </div>

                <div class="card-footer">

                  <a href="admin/books/edit/<?php echo $book->id?>" class="btn btn-secondary"><?php echo __('custom.cancel')?></a>
                  <button type="submit" class="btn btn-primary"><?php echo __('custom.save')?></button>
                </div>
              </form>
            </div>
        </div>

    </main>

<?php echo $footer ?>
