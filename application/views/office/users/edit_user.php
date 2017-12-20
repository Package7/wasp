<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Dashboard</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('public/images/favicon.ico'); ?>">
		<?php load_styles(); ?>
        <script src="<?= base_url('assets/js/modernizr.min.js'); ?>"></script>
    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">
			<?= $get_header; ?>
			<?= $get_sidebar; ?>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="header-title m-t-0 m-b-20">Edit <?= $user->first_name; ?> <?= $user->last_name; ?> <span class="text-muted" style="font-size: 10px;">last seen <?= date('d/m/Y H:i', $user->last_login); ?></span></h4>
                            </div>
                        </div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label" for="first_name">First name</label>
									<input class="form-control" type="text" name="first_name" id="first_name" value="<?= $user->first_name; ?>"/>
								</div>
								<div class="form-group">
									<label class="col-form-label" for="last_name">Last name</label>
									<input class="form-control" type="text" name="last_name" id="last_name" value="<?= $user->last_name; ?>"/>
								</div>
								<div class="form-group">
									<label class="col-form-label" for="email">Email</label>
									<input class="form-control" type="email" name="email" id="email" value="<?= $user->email; ?>"/>
								</div>
								<div class="form-group">
									<label class="col-form-label" for="last_name">Phone</label>
									<input class="form-control" type="tel" name="phone" id="phone" value="<?= $user->phone; ?>"/>
								</div>
							</div>
							<div class="col-sm-6 text-center">
								Picture
							</div>
						</div>
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="header-title m-t-20 m-b-20">Change password</h5>
                            </div>
                        </div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label" for="password">Password</label>
									<input class="form-control" type="password" name="password" id="password" value=""/>
								</div>
								<div class="form-group">
									<label class="col-form-label" for="password_confirm">Confirm password</label>
									<input class="form-control" type="password" name="password_confirm" id="password_confirm" value=""/>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12 text-right">
								<button type="submit" class="btn btn-dark">Save user</button>
							</div>
						</div>
                    </div> <!-- container -->


                   <?= $get_footer; ?>

                </div> <!-- content -->
			</div>
        </div><!-- END wrapper -->
		<?php load_scripts(); ?>
    </body>
</html>