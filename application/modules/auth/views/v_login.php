<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(''); ?>public/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url(''); ?>public/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url(''); ?>public/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url(''); ?>public/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

	<script>
        var site_url 		= '<?php echo site_url(); ?>';
		var class_url 		= '<?php echo currentClass(); ?>';
		var currentClass	= site_url + '/' + class_url + '/';
    </script>

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Selamat Datang!</h5>
                                        <p>Masuk untuk lanjut ke Beranda.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?php echo base_url(''); ?>public/assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            
                            <div class="p-2">
                                <form class="form-horizontal" action="#" method="post" id="form_login" name="form_login">

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
										<div class="help-block"></div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="Enter password" aria-label="Password" id="password" name="password" aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                        <div class="help-block"></div>
                                    </div>
									<div class="text-center" id="alertLogin"></div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" id="btnLogin">Log In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Forgot your password?</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">

                        <div>
                            <p>©
                                <script>document.write(new Date().getFullYear())</script> Skote. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by Said
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="<?php echo base_url(''); ?>public/assets/libs/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(''); ?>public/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(''); ?>public/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url(''); ?>public/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo base_url(''); ?>public/assets/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url(''); ?>public/assets/js/app.js"></script>
	<?= isset($libjs) ? '<script src="'.base_url('').'public/libjs/'.$libjs.'"></script>' : '' ?>
</body>

</html>