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
                                <h4 class="header-title m-t-0 m-b-20">Blank Page</h4>
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