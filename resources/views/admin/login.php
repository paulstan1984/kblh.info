<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <base href="<?php echo env('BASE_URL') ?>"/>
        <title><?php echo __('custom.adminTitle')?></title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?php echo __('custom.login')?></h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="admin/login">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress"><?php echo __('validation.attributes.email')?></label>
                                                <input class="form-control py-4" id="inputEmailAddress" name="email" value="<?php echo old('email')?>" />

                                                <?php if($errors->get('email')) { ?>
                                                <span class="error">
                                                    <?php echo implode(',', $errors->get('email'));?>
                                                </span>
                                                <?php } ?>  
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword"><?php echo __('validation.attributes.password')?></label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password"/>

                                                <?php if($errors->get('password')) { ?>
                                                <span class="error">
                                                    <?php echo implode(',', $errors->get('password'));?>
                                                </span>
                                                <?php } ?>  
                                            </div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <?php /*
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                */ ?>
                                                <input class="btn btn-primary" type="submit" value="<?php echo __('custom.login')?>"/>
                                            </div>
                                        </form>
                                    </div>
                                    <?php /*
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                    */ ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">&copy; kblh.info <?php echo date('Y')?></div>
                            
                            <?php /*
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                            */?>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
