<?php
namespace KNTRTEST\Inc;

class Assets {
	use Traits\Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	protected function setup_hooks() {
		add_action('wp_enqueue_scripts', [ $this, 'register_styles']);
		add_action('wp_enqueue_scripts', [ $this, 'register_scripts']);
	}

	public function register_styles() {
		wp_register_style(
			'style-css', KNTRTEST_URI . "/style.css", 
			[], filemtime(KNTRTEST_DIR . "/style.css")
		);
		wp_register_style(
			'bootstrap-css', KNTRTEST_URI . "/assets/src/bootstrap/css/bootstrap.min.css", 
			[], false
		);

		wp_enqueue_style('style-css');
		wp_enqueue_style('bootstrap-css');
	}

	public function register_scripts() {
		wp_register_script(
			'main-js', KNTRTEST_URI . '/assets/main.js',
			[], filemtime(KNTRTEST_DIR . "/assets/main.js"),
			true
		);
		wp_register_script(
			'popper-js', 'https://unpkg.com/@popperjs/core@2',
			[], false,
			true
		);
		wp_register_script(
			'bootstrap-js', KNTRTEST_URI . '/assets/src/bootstrap/js/bootstrap.min.js',
			['popper-js'], false,
			true
		);

		wp_enqueue_script('main-js');
		wp_enqueue_script('bootstrap-js');
	}
}
