<?php echo $header ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?php echo __('custom.authors')?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">
                    <a href="admin">
                        <?php echo __('custom.home')?>
                    </a>
                </li>
                <li class="breadcrumb-item active"><?php echo __('custom.authors')?></li>
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

                <div class="card-header row">
                    <div class="col-xs-12 col-md-3">
                        <a class="btn btn-primary" href="admin/authors/edit/0"><?php echo __('custom.addnew')?></a>
                    </div>
                    <form class="col-xs-12 col-md-9 form-row" method="GET" action="<?php echo paginatedQuery('admin/authors', $results, ['page'=>1])?>">
                        <div class="col-auto">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-search-plus"></i></div>
                                </div>
                                <input class="form-control" type="text" name="name" value="<?php echo old('name', $results->name)?>" placeholder="<?php echo __('custom.name')?>"/>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input class="btn btn-primary" type="submit" value="<?php echo __('custom.search')?>"/>
                        </div>
                    </form>
                </div>
                

                <?php if(count($results->results)>0){?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>
                                        <a href="<?php echo paginatedQuery('admin/authors', $results, ['orderby'=>'id','orderbydir' => getOrderDir($results, 'id')])?>">
                                            <?php echo __('custom.id')?> 
                                            <?php echo orderIcon($results, 'id')?>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="<?php echo paginatedQuery('admin/authors', $results, ['orderby'=>'name','orderbydir' => getOrderDir($results, 'name')])?>">
                                            <?php echo __('custom.name')?>
                                            <?php echo orderIcon($results, 'name')?>
                                        </a>
                                    </th>
                                    <th><?php echo __('custom.actions')?></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                <th>
                                    <?php echo __('custom.id')?></th>
                                    <th><?php echo __('custom.name')?></th>
                                    <th><?php echo __('custom.actions')?></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach($results->results as $item){?>
                                <tr>
                                    <td><?php echo $item->id?></td>
                                    <td><?php echo $item->name?></td>
                                    <td>
                                        <a class="btn btn-primary" href="admin/authors/edit/<?php echo $item->id?>">
                                            <i class="fas fa-edit"></i>
                                            <?php echo __('custom.edit')?>
                                        </a>

                                        <a class="btn btn-danger" href="admin/authors/delete/<?php echo $item->id?>" onclick="return confirm('Confirmați?')">
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
                                <a href="<?php echo paginatedQuery('admin/authors', $results, ['page'=>1])?>" aria-controls="dataTable" class="page-link">
                                    <?php echo __('custom.first')?>
                                </a>
                            </li>

                            <?php for($i=$results->page-10;$i<$results->page+10;$i++){
                            if($i>=1 && $i<=$results->nrpages) {?>
                            <li class="paginate_button page-item <?php echo $i==$results->page?'active':''?>">
                                <a href="<?php echo paginatedQuery('admin/authors', $results, ['page'=>$i])?>" aria-controls="dataTable" class="page-link"><?php echo $i?></a>
                            </li>
                            <?php }}?>
                            
                            <li class="paginate_button page-item next">
                                <a href="<?php echo paginatedQuery('admin/authors', $results, ['page'=>$results->nrpages])?>" aria-controls="dataTable" class="page-link">
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
