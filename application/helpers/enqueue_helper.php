<?php

	defined('BASEPATH') OR exit('No direct script access allowed');
	
	function load_styles() {
		$styles = array(
			'bootstrap' 	=> 'bootstrap.min.css',
			'icons' 		=> 'icons.css',
			'metismenu' 	=> 'metismenu.min.css',
			'style' 		=> 'style.css'
		);
		
		foreach($styles as $style => $path) {
			echo '<link type="text/css" rel="stylesheet" href="' . base_url('public/css/' . $path) . '"/>';
		}
	}
	
	function load_scripts() {
		$scripts = array(
			'jquery' 		=> 'jquery.min.js',
			'popper' 		=> 'popper.min.js',
			'bootstrap' 	=> 'bootstrap.min.js',
			'metisMenu' 	=> 'metisMenu.min.js',
			'waves' 		=> 'waves.js',
			'slimscroll' 	=> 'jquery.slimscroll.js',
			'core' 			=> 'jquery.core.js',
			'app'			=> 'jquery.app.js'
		);
		
		foreach($scripts as $script => $path) {
			echo '<script type="text/javascript" src="' . base_url('public/js/' . $path) . '"></script>';
		}
	}
	
	function frontend_load_styles() {
		$styles = array(
			'bootstrap' 	=> 'bootstrap.min.css',
			'style' 		=> 'default.css'
		);
		
		foreach($styles as $style => $path) {
			echo '<link type="text/css" rel="stylesheet" href="' . base_url('public/css/' . $path) . '"/>';
		}
	}
	
	function frontend_load_scripts() {
		$scripts = array(
			'jquery' 		=> 'jquery.min.js',
			'popper' 		=> 'popper.min.js',
			'bootstrap' 	=> 'bootstrap.min.js'
		);
		
		foreach($scripts as $script => $path) {
			echo '<script type="text/javascript" src="' . base_url('public/js/' . $path) . '"></script>';
		}
	}
	
	function slugify($text) {
		// replace non letter or digits by -
		$text = preg_replace('~[^\pL\d]+~u', '-', $text);

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		// trim
		$text = trim($text, '-');

		// remove duplicate -
		$text = preg_replace('~-+~', '-', $text);

		// lowercase
		$text = strtolower($text);

		if (empty($text)) {
		return 'n-a';
		}

		return $text;
	}
	
?>