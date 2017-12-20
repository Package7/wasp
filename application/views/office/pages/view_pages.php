<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Pages</title>
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
                                <h4 class="header-title m-t-0 m-b-0" style="margin-bottom: 0px !important;">Pages <a href="<?= base_url('office/pages/add'); ?>" class="btn btn-sm btn-primary">Add New</a></h4>
								
								<table id="pages" class="table table-striped">
									<thead>
										<tr>
											<th>
												&nbsp;
											</th>
											<th>Title</th>
											<th>Author</th>
											<th>Date</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($pages as $page): ?>
										<tr id="<?= $page['page_id']; ?>">
											<td width="1">
												<div class="checkbox checkbox-primary checkbox-single checkbox-square">
													<input type="checkbox" id="singleCheckbox21" value="<?= $page['page_id']; ?>" aria-label="Single checkbox Two">
													<label></label>
												</div>
											</td>
											<td>
												<div><?= $page['page_title']; ?></div>
												<div class="options" style="visibility: hidden;">
													<ul class="list-inline" style="margin: 0;">
														<li class="list-inline-item"><a href="<?= base_url('office/pages/' . $page['page_id']); ?>">Edit</a></li>
														<li class="list-inline-item"><a href="#">Duplicate</a></li>
														<li class="list-inline-item"><a href="#" class="text-danger">Delete</a></li>
													</ul>
												</div>
											</td>
											<td><?= $page['page_author']; ?></td>
											<td>
												<div><?= date('d/m/Y', strtotime($page['page_created'])); ?></div>
												<div>Published</div>
											</td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
                            </div>
                        </div>

                    </div> <!-- container -->
                   <?= $get_footer; ?>
                </div>
            </div>
        </div>
      <?php load_scripts(); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			$('table#pages tr').each(function() {
				$(this).mouseover(function() {
					var id = $(this).attr('id');
					// $('tr#' + id + ' div.options').show();
					$('tr#' + id + ' div.options').css('visibility', 'visible'); ;
					return false;
				}).mouseout(function() {
					$('div.options').css('visibility', 'hidden');
				});
			});
		});
	</script>
    </body>
</html>