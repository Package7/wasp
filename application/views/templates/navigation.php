<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="#">Simple</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Services</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contact</a>
				</li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<?php if($this->ion_auth->logged_in()): ?>
				<li class="nav-item">
					<a href="<?= base_url('account'); ?>" class="nav-link">Account</a>
				</li>
				<?php if($this->ion_auth->is_admin()): ?>
				<li class="nav-item">
					<a href="<?= base_url('office'); ?>" class="nav-link">Office</a>
				</li>
				<?php endif; ?>
				<li class="nav-item">
					<a href="<?= base_url('logout'); ?>" class="nav-link">Logout</a>
				</li>
				<?php else: ?>
				<li class="nav-item">
					<a href="<?= base_url('login'); ?>" class="nav-link btn btn-outline-danger">Login</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('register'); ?>" class="nav-link">Register</a>
				</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>