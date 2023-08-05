<?php
/**
 * Theme functions
 *
 * @package kntrtest 
 */

if (!defined('KNTRTEST_DIR')) {
	define('KNTRTEST_DIR', untrailingslashit(get_template_directory()));
}
if (!defined('KNTRTEST_URI')) {
	define('KNTRTEST_URI', untrailingslashit(get_template_directory_uri()));
}
require_once KNTRTEST_DIR . '/inc/helpers/autoloader.php';

\KNTRTEST\Inc\KNTRTEST_THEME::get_instance();

function kntrtest_enqueue_scripts() {
	$_uri = get_template_directory_uri();
	$_dir = get_template_directory();
}

