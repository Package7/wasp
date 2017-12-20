<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Account details</title>
	<?php frontend_load_styles(); ?>
  </head>
  <body>
  <?= $get_navigation; ?>

    <!-- Page Content -->
    <div class="container">
		<div class="row my-4">
			<?= $get_account_sidebar; ?>
			<div class="col-lg-9 col-md-8">
				<h3>Account details</h3>
				<hr/>
				<?= validation_errors(); ?>
<?php echo form_open(uri_string());?>
		<div class="form-group">
			<label>First name</label>
			<input class="form-control" name="account_fname" value="<?= $account->first_name; ?>"/>
		</div>
		<div class="form-group">
			<label>Last name</label>
			<input class="form-control" name="account_lname" value="<?= $account->last_name; ?>"/>
		</div>
		<div class="form-group">
			<label>E-mail address</label>
			<input class="form-control" name="account_email" value="<?= $account->email; ?>"/>
		</div>
		<div class="form-group">
			<label>Phone number</label>
			<input class="form-control" name="account_phone" value="<?= $account->phone; ?>"/>
		</div>
		<p>
			<button type="submit" class="btn btn-primary">Save</button>
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
