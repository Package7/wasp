
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Responsive bootstrap landing template">
        <meta name="author" content="">

        <link rel="shortcut icon" href="images/favicon.ico">

        <title>Base - Responsive Multipurpose Landing Page Template</title>
		<?php frontend_load_styles(); ?>
    </head>


    <body class="bg-signup">

        <!-- START HOME  -->
        <section class="bg-custom section">
            <div class="login-table">
                <div class="login-table-cell">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-4">
                                <div class="text-center">
                                    <h1 class="text-white">Simple</h1>
                                </div>
                                <div class="bg-white p-4 mt-5 rounded">
                                    <h5 class="text-center text-muted">Register a new account</h5>
									<?= validation_errors('<p class="alert alert-danger">'); ?>
                                    <?= form_open('register', array('class' => 'login-form')); ?>
                                        <div class="row">
                                            <div class="col-lg-12 mt-4">
                                                <input type="text" name="account_name" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="col-lg-12 mt-4">
                                                <input type="email" name="account_email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="col-lg-12 mt-4">
                                                <input type="password" name="account_password" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="col-lg-12 mt-4">
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">I agree with <a href="<?= base_url('legal/terms-and-conditions'); ?>">Terms and Conditions</a></span>
                                                </label>
                                            </div>
                                            <div class="col-lg-12 mt-4 mb-4">
                                                <button class="btn btn-custom w-100">Register</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="text-center mt-3">
                                    <p><small class="text-white mr-2">Already have an account?</small> <a href="<?= base_url('login'); ?>" class="text-white font-weight-bold text-capitalize">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HOME -->
		<?php frontend_load_scripts(); ?>
    </body>
</html>