<?php
namespace KNTRTEST\Inc;

class KNTRTEST_THEME {
	use Traits\Singleton;

	protected function __construct() {
		Assets::get_instance();
		$this->setup_hooks();
	}

	protected function setup_hooks() {
	}
}
