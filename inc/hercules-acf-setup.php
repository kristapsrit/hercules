<?php

/**
 * ACF Setup 
 * 
 * @package Hercules
 */

// 1. Customize ACF path
add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path($path)
{
	$path = HERCULES_TEMPLATE_DIR . '/vendor/acf/';
	return $path;
}

// 2. Customize ACF dir
add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir($dir)
{
	$dir = HERCULES_DIR_URI . '/vendor/acf/';
	return $dir;
}

// 3. Include ACF
include_once(HERCULES_TEMPLATE_DIR . '/vendor/acf/acf.php');

// Show ACF in admin menu
add_filter('acf/settings/show_admin', 'my_acf_show_admin');
function my_acf_show_admin($show)
{
	return true;
}

//Add theme settings page
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'icon_url'      => 'dashicons-unlock',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header Settings',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer Settings',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Casino Settings',
		'menu_title'	=> 'Casino Settings',
		'parent_slug'	=> 'theme-general-settings',
	));
}
