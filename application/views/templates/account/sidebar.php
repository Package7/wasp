<?php

	$menu_items = array(
		'Account details'	=>	array(
			'url'	=>	base_url('account'),
			'prefix'	=>	'',
			'suffix'	=>	'',
			'icon'		=> ''
		),
		'Change password'	=>	array(
			'url'	=>	base_url('account/change-password'),
			'prefix'	=>	'',
			'suffix'	=>	'',
			'icon'		=> ''
		)
	);
	
?>

<div class="col-lg-3 col-md-4">
	<div class="list-group">
		<?php
			$menu = '';
			foreach($menu_items as $name => $value) {
				$menu .= '<a href="' . $value['url'] . '" class="list-group-item list-group-item-action';
				
				if(current_url() == $value['url']) {
					$menu .= ' active';
				}
				
				$menu .= '">' . $name . '</a>';
			}
			echo $menu;
			
		?>
	</div>
</div>