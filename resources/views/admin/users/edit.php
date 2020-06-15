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
                  <a href="admin/users">
                    <?php echo __('custom.users')?>
                  </a>
                </li>
                <li class="breadcrumb-item active">
                    <?php echo $id == 0 ? __('custom.add'):__('custom.edit')?>
                </li>
            </ol>

            <div class="card mb-4">
              <form method="POST" action="admin/users/edit/<?php echo $id?>">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-4">
                      <label><?php echo __('custom.firstname')?>: </label>
                      <input class="form-control" type="text" name="firstname" value="">

                      <label><?php echo __('custom.lastname')?>: </label>
                      <input class="form-control" type="text" name="lastname" value="">
                    </div>

                    <div class="col-sm-12 col-md-4">
                      <label><?php echo __('custom.email')?>: </label>
                      <input class="form-control" type="text" name="email" value="">

                      <label><?php echo __('custom.role')?>: </label>
                      
                      <select class="form-control">
                        <option value="admin"><?php echo __('custom.admin')?></option>
                        <option value="member"><?php echo __('custom.member')?></option>
                      </select>
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
