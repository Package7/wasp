<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Dashboard</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('public/images/favicon.ico'); ?>">
		<?php load_styles(); ?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="<?= base_url('assets/js/modernizr.min.js'); ?>"></script>
    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">
			<?= $get_header; ?>
			<?= $get_sidebar; ?>
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                                <h4 class="header-title m-t-0 m-b-20">Menus <select name="menu_id" class="pull-right"><option value="1">header menu</option></select></h4>
                        <div class="row">
                            <div class="col-sm-4">
								<div class="card card-primary mb-3">
								
									<form id="available_menus">
									<div class="card-header">Availble</div>
									<div class="card-body text-primary">
								<?php
								
									foreach($pages as $page) {
						 				echo '<p id="' . $page['page_id'] . '"><input type="checkbox" name="pages" data-name="' . $page['page_title'] . '" value="' . $page['page_id'] . '"/> ' . $page['page_title'] . '</p>';
									}
									
								?>
									
								
									</div>
									<div class="card-footer text-right">
										<button class="btn btn-primary" type="submit">Save</button>
									</div>
										</form>
								</div>
                            </div>
							<div class="col-sm-8">
								<ul id="sortable_menu" class="list droptrue ui-sortable" style="margin: 0; padding: 0; list-style-type:none;">
								</ul>
							</div>
						</div>
                    </div> <!-- container -->


                   <?= $get_footer; ?>

                </div> <!-- content -->
			</div>
        </div><!-- END wrapper -->
		<?php load_scripts(); ?>
		 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		 <script type="text/javascript">
			$('form#available_menus').submit(function(event) {
				event.preventDefault();
				$('input[name=pages]').each(function() {
					var value = $(this).val();
					var name = $(this).data('name');
					var is_checked = $(this).prop('checked');
					if(is_checked == true) {
						$('ul#sortable_menu').append('<li class="ui-state-default ui-sortable-handle">' + name + '</li>');
						$('p#' + $(this).val()).remove();
					}
				});
			});
			$( "ul#sortable_menu" ).sortable({
				dropOnEmpty: false,
				update: function(event, ui) {
					var data = $(this).sortable('serialize');
					$.ajax({
						data: data,
						type: 'POST',
						url: '<?= base_url('appearance/sort_menus'); ?>',
						success: function(response) {
							console.log(response);
						}
					});
				}
			});
		 </script>
    </body>
</html>