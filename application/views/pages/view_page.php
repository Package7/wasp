<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Small Business - Start Bootstrap Template</title>
	<?php frontend_load_styles(); ?>
  </head>
  <body>
  <?= $get_navigation; ?>

    <!-- Page Content -->
    <div class="container">
		<h1><?= $page['page_title']; ?></h1>
		<?= $page['page_content']; ?>
    </div>
    <!-- /.container -->

    <?= $get_footer; ?>
	<?php frontend_load_scripts(); ?>
  </body>

</html>
