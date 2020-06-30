<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <base href="<?php echo env('BASE_URL') ?>" />
    <title><?php echo __('custom.adminTitle') ?></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>


    <script type="module">
        import { LaTeXJSComponent } from "https://cdn.jsdelivr.net/npm/latex.js/dist/latex.mjs"
        customElements.define("latex-js", LaTeXJSComponent)
    </script>

    <style>
        latex-js {
            display: inline-block;
            border: 1px solid #ced4da;
            width: 100%;
        }
    </style>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="admin"><?php echo __('custom.adminTitle') ?></a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->

        <?php /*
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            */ ?>
        <!-- Navbar-->
        <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <?php /*
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        */ ?>
                    <a class="dropdown-item" href="admin/logout"><?php echo __('custom.logout') ?></a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="admin">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            <?php echo __('custom.home') ?>
                        </a>

                        <a class="nav-link" href="admin/authors">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                            <?php echo __('custom.authors') ?>
                        </a>

                        <a class="nav-link" href="admin/books">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            <?php echo __('custom.books') ?>
                        </a>

                        <a class="nav-link" href="admin/categories">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            <?php echo __('custom.categories') ?>
                        </a>

                        <a class="nav-link" href="admin/users">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            <?php echo __('custom.users') ?>
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small"><?php echo __('custom.loggedInAs') ?>:</div>
                    <?php echo $admin->firstname ?> <?php echo $admin->lastname ?> (<?php echo $admin->role ?>)
                </div>
            </nav>
        </div>