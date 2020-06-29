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

            <div class="card mb-4">

                <div class="card-header">
                    <a class="btn btn-primary" href="admin/users/edit/0"><?php echo __('custom.addnew')?></a>
                </div>
                
                <?php if(count($results->results)>0){?>
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
                                    <th><?php echo __('custom.actions')?></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th><?php echo __('custom.email')?></th>
                                    <th><?php echo __('custom.firstname')?></th>
                                    <th><?php echo __('custom.lastname')?></th>
                                    <th><?php echo __('custom.role')?></th>
                                    <th><?php echo __('custom.dateadded')?></th>
                                    <th><?php echo __('custom.actions')?></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($results->results as $item){?>
                                <tr>
                                    <td><?php echo $item->email?></td>
                                    <td><?php echo $item->firstname?></td>
                                    <td><?php echo $item->lastname?></td>
                                    <td><?php echo __('custom.'.$item->role)?></td>
                                    <td><?php echo $item->created_at->format('Y-m-d')?></td>
                                    <td>
                                        <a class="btn btn-primary" href="admin/users/edit/<?php echo $item->id?>">
                                            <i class="fas fa-edit"></i>
                                            <?php echo __('custom.edit')?>
                                        </a>

                                        <a class="btn btn-secondary" href="admin/users/changepassword/<?php echo $item->id?>">
                                            <i class="fas fa-key"></i>
                                            <?php echo __('custom.editpassword')?>
                                        </a>

                                        <a class="btn btn-danger" href="admin/users/delete/<?php echo $item->id?>" onclick="return confirm('Confirmați?')">
                                            <i class="fas fa-trash"></i>
                                            <?php echo __('custom.delete')?>
                                        </a>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>


                    </div>

                </div>

                <div class="card-footer">
                    <div class="dataTables_paginate paging_simple_numbers pullright">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous">
                                <a href="#" aria-controls="dataTable" class="page-link">
                                    <?php echo __('custom.first')?>
                                </a>
                            </li>

                            <?php for($i=$results->page-10;$i<$results->page+10;$i++){
                            if($i>=1 && $i<=$results->nrpages) {?>
                            <li class="paginate_button page-item <?php echo $i==$results->page?'active':''?>">
                                <a href="#" aria-controls="dataTable" class="page-link"><?php echo $i?></a>
                            </li>
                            <?php }}?>
                            
                            <li class="paginate_button page-item next">
                                <a href="#" aria-controls="dataTable" class="page-link">
                                    <?php echo __('custom.last')?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php } else {?>
                <div class="card-body">
                    <p class="alert alert-info"><?php echo __('custom.nodata')?></p>
                </div>
                <?php } ?>
            </div>
        </div>

    </main>

<?php echo $footer ?>
