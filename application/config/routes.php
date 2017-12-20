<?php
	
	defined('BASEPATH') OR exit('No direct script access allowed');

	$route['default_controller'] 		= 	'homepage';
	$route['register']					=	'accounts/register';
	$route['activate']					=	'accounts/activate';
	$route['activate/(:any)']			=	'accounts/activate/$1';
	$route['login']						=	'accounts/login';
	$route['logout']					=	'accounts/logout';
	$route['forgot-password']			=	'accounts/forgot_password';
	$route['reset-password']			=	'accounts/reset_password';
	$route['reset-password/(:any)']		=	'accounts/reset_password/$1';
	$route['account']					=	'accounts/account';
	$route['account/change-password'] 	=	'accounts/change_password';
	$route['account/delete-account'] 	=	'accounts/delete_account';
	$route['office'] 					=	'homepage';
	$route['office'] 					= 	'dashboard';
	$route['office/users'] 				= 	'users';
	$route['office/users/(:num)'] 		= 	'users/edit_user/$1';
	$route['office/pages'] 				= 	'pages';
	$route['office/pages/add'] 			= 	'pages/add_page';
	$route['office/pages/(:num)'] 		= 	'pages/edit_page/$1';
	$route['office/appearance/menus'] 	= 	'appearance/menus';
	$route['office/settings'] 			= 	'settings';
	$route['404_override'] 				= 	'';
	$route['([A-Za-z0-9][A-Za-z0-9_-]{2,254})'] = 'pages/view_page/$1';
	$route['translate_uri_dashes'] = FALSE;