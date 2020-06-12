<?php echo $header ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?php echo __('custom.users')?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="admin">
                        <?php echo __('custom.home')?>
                    </a>
                </li>
                <li class="breadcrumb-item active"><?php echo __('custom.users')?></li>
            </ol>

            <div class="card mb-4">
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?php echo __('custom.email')?></th>
                                    <th><?php echo __('custom.firstname')?></th>
                                    <th><?php echo __('custom.lastname')?></th>
                                    <th><?php echo __('custom.role')?></th>
                                    <th><?php echo __('custom.dateadded')?></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><?php echo __('custom.email')?></th>
                                    <th><?php echo __('custom.firstname')?></th>
                                    <th><?php echo __('custom.lastname')?></th>
                                    <th><?php echo __('custom.role')?></th>
                                    <th><?php echo __('custom.dateadded')?></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($results as $item){?>
                                <tr>
                                    <td><?php echo $item->email?></td>
                                    <td><?php echo $item->firstname?></td>
                                    <td><?php echo $item->lastname?></td>
                                    <td><?php echo $item->role?></td>
                                    <td><?php echo $item->created_at->format('Y-m-d')?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
        </div>
    </main>

<?php echo $footer ?>
