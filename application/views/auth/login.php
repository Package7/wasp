<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Login</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('public/images/favicon.ico'); ?>">
		<?php load_styles(); ?>
        <script src="<?= base_url('assets/js/modernizr.min.js'); ?>"></script>
    </head>
    <body>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 card-box">
                                <div class="text-center">
                                    <h2 class="text-uppercase m-t-0 m-b-30">
                                        <a href="index.html" class="text-success">
                                            <span><img src="<?= base_url('public/images/logo_dark.png'); ?>" alt="" height="30"></span>
                                        </a>
                                    </h2>
                                </div>
                                <div class="account-content">
									<div id="infoMessage"><?php echo $message;?></div>
                                    <?php echo form_open("auth/login");?>

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <label for="emailaddress">Email address</label>
                                                <input class="form-control" type="email" name="identity" id="identity" required="" placeholder="john@deo.com">
                                            </div>
                                        </div>

                                        <div class="form-group m-b-20">
                                            <div class="col-xs-12">
                                                <a href="<?= base_url('auth/forgot_password'); ?>" class="text-muted pull-right font-14"><?php echo lang('login_forgot_password');?></a>
                                                <label for="password">Password</label>
                                                <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                                            </div>
                                        </div>

                                        <div class="form-group m-b-30">
                                            <div class="col-xs-12">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="remember" name="remember" value="1" type="checkbox">
                                                    <label for="checkbox5">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
												<!-- <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>-->
                                            </div>
                                        </div>

                                   <?php echo form_close();?>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="<?= base_url('auth/create_user'); ?>" class="text-dark m-l-5">Sign Up</a></p>
                                </div>
                            </div>

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
        </section>


        <!-- jQuery  -->
      <?php load_scripts(); ?>

    </body>
</html>