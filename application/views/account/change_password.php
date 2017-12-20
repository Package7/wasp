<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Change password</title>
	<?php frontend_load_styles(); ?>
  </head>
  <body>
  <?= $get_navigation; ?>

    <!-- Page Content -->
    <div class="container">

      
		<div class="row my-4">
			<?= $get_account_sidebar; ?>
			<div class="col-lg-9 col-md-8">
				<h3>Change password</h3>
				<hr/>
				<?php
				
					if(isset($success)) {
						echo '<div class="alert alert-success">' . $success . '</div>';
					} else {
						if(isset($error)) {
							echo '<div class="alert alert-danger">' . $error . '</div>';
						}
					}
					
				?>
<?php echo form_open(uri_string());?>
		<div class="form-group">
			<label>Current password</label>
			<input class="form-control" name="current_password" value=""/>
		</div>
		<div class="form-group">
			<label>New password</label>
			<input class="form-control" name="new_password" value=""/>
		</div>
		<div class="form-group">
			<label>Confirm new password</label>
			<input class="form-control" name="new_password_confirm" value=""/>
		</div>
		<p>
			<button type="submit" class="btn btn-primary">Change password</button>
		</p>

<?php echo form_close();?>
			</div>
		</div>

      <!-- /.row -->


    </div>
    <!-- /.container -->

   <?= $get_footer; ?>
	<?php frontend_load_scripts(); ?>
  </body>

</html>
