<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Pages</title>
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('public/images/favicon.ico'); ?>">
		<?php load_styles(); ?>
        <script src="<?= base_url('public/js/modernizr.min.js'); ?>"></script>
		<link rel="stylesheet" type="text/css" href="<?= base_url('public/plugins/summernote/summernote-bs4.css'); ?>"/>
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
                                <h4 class="header-title m-t-0 m-b-20">Add New Page</h4>
								<?= validation_errors('<p class="alert alert-danger">'); ?>
                            </div>
                        </div>
						<?= form_open(base_url('pages/add_page')); ?>
						<div class="row">
							<div class="col-sm-9">
								<input name="page_title" id="page_title" type="text" class="form-control" placeholder="Page Title" value="<?php echo set_value('page_title'); ?>"/>
								<br/>
								<textarea name="page_content" id="page_content" class="form-control"></textarea>
							</div>
							<div class="col-sm-3">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Publish</h3>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<label class="col-form-label" for="page_status">Status</label>
											<select name="page_status" class="form-control" id="page_status">
												<option value="0">Draft</option>
												<option value="1">Published</option>
											</select>
										</div>
										<div class="form-group">
											<label class="col-form-label" for="page_visibility">Visibility</label>
											<select name="page_visibility" class="form-control" id="page_visibility">
												<option value="0">Public</option>
												<option value="1">Private</option>
											</select>
										</div>
									</div>
									<div class="panel-footer" style="padding: 5px; text-align: right;">
										<button type="submit" class="btn btn-dark">Publish</button>
									</div>
								</div>
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">Page attributes</h3>
									</div>
									<div class="panel-body">
										<div>Parent</div>
										<div>
											<select name="page_parent" class="form-control">
												<option value="0">(no parent)</option>
												<?php
													if(isset($pages)) {
														foreach($pages as $page) {
															echo '<option value="' . $page['page_id'] . '">' . $page['page_title'] . '</option>';
														}
												
											echo '<option value="sluga">sluga proastAA!!!</option>';
													} else {
													echo 'nu e';
													}
													
													
												?>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?= form_close(); ?>
                    </div> <!-- container -->
                   <?= $get_footer; ?>
                </div>
            </div>
        </div>
      <?php load_scripts(); ?>
	  <script type="text/javascript" src="<?= base_url('public/plugins/summernote/summernote-bs4.min.js'); ?>"></script>
	    <script type="text/javascript">
    $(function() {
      $('#page_content').summernote({
        height: 500
      });

      // $('form').on('submit', function (e) {
        // e.preventDefault();
        // alert($('.summernote').summernote('code'));
        // alert($('.summernote').val());
      // });
    });
  </script>
    </body>
</html>