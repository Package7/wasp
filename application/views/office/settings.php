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
        <div id="wrapper">
			<?= $get_header; ?>
			<?= $get_sidebar; ?>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="header-title m-t-0 m-b-20">Settings</h4>
								<?= form_open(base_url('office/settings')); ?>
								<div class="alert alert-danger"><?= validation_errors(); ?></div>
								<?php
								
									if(isset($settings)) {
										foreach($settings as $setting) {
											echo '
											<div class="form-group">
												 <label class="col-form-label" for="formGroupExampleInput">' . $setting['setting_name'] . '</label>
												<input type="text" name="' . $setting['setting_code'] . '" value="' . $setting['setting_value'] . '" class="form-control"/>
												<span class="form-text text-muted">[' . $setting['setting_code'] . ']</span>
											</div>';
										}
									}
									
								?>
								<div class="text-right">
									<button type="submit" name="submitted" class="btn btn-dark"><i class="fa fa-cog"></i> Save settings</button>
								</div>
								<?= form_close(); ?>
                            </div>
                        </div>
                    </div> <!-- container -->
                   <?= $get_footer; ?>
                </div>
            </div>
        </div>
      <?php load_scripts(); ?>
    </body>
</html>