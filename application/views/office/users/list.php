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
                                <h4 class="header-title m-t-0 m-b-20">Users</h4>
								 <table class="table table-striped m-0">
									<thead>
										<th style="border: 0;">ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th colspan="3">Options</th>
									</thead>
									<tbody>
								<?php
								
									foreach($users as $user) {
										echo '<tr><td>' . $user['id'] . '</td><td>' . $user['first_name'] . ' ' . $user['last_name'] . '</td><td>' . $user['email'] . '</td><td>' . $user['phone'] . '</td><td width="1"><a href="#" class="btn btn-xs btn-default">Deactivate</a></td><td width="1"><a href="' . base_url('office/users/' . $user['id']) . '" class="btn btn-warning btn-xs">Edit</a></td><td width="1"><a href="#" class="btn btn-xs btn-danger">Delete</a></td></tr>';
									}
									
								?>
									</tbody>
								</table>
                            </div>
                        </div>

                    </div> <!-- container -->


                   <?= $get_footer; ?>

                </div> <!-- content -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


      <?php load_scripts(); ?>

    </body>
</html>