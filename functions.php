<?php
/**
 * Theme functions
 *
 * @package firsttheme 
 */

function firsttheme_enqueue_scripts() {
	$_uri = get_template_directory_uri();
	$_dir = get_template_directory();

	// Register styles
	wp_register_style(
		'style-css', $_uri . "/style.css", 
		[], filemtime($_dir . "/style.css")
	);
	wp_register_style(
		'bootstrap-css', $_uri . "/assets/src/bootstrap/css/bootstrap.min.css", 
		[], false
	);

	wp_register_script(
		'main-js', $_uri . '/assets/main.js',
		[], filemtime($_dir . "/assets/main.js"),
		true
	);
	wp_register_script(
		'popper-js', 'https://unpkg.com/@popperjs/core@2',
		[], false,
		true
	);
	wp_register_script(
		'bootstrap-js', $_uri . '/assets/src/bootstrap/js/bootstrap.min.js',
		['popper-js'], false,
		true
	);

	// Enqueue
	wp_enqueue_style('style-css');
	wp_enqueue_style('bootstrap-css');
	wp_enqueue_script('main-js');
	wp_enqueue_script('bootstrap-js');
}

add_action('wp_enqueue_scripts', 'firsttheme_enqueue_scripts');
