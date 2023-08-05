<?php

namespace KNTRTEST\Inc\Helpers;

function autoloader( $resource = '' ) {
	$resource_path = false;
	$namespace_root = 'KNTRTEST\\';
	$resource = trim($resource, '\\');

	$is_foreign_namespace = empty($resource);
	$is_foreign_namespace |= strpos($resource, '\\') === false;
	$is_foreign_namespace |= strpos($resource, $namespace_root) !== 0;

	if ($is_foreign_namespace) {
		return;
	}

	$resource = str_replace($namespace_root, '', $resource);
	$path = explode(
		'\\',
		str_replace('_', '-', strtolower($resource))
	);

	if (empty($path[0]) || empty($path[1])) {
		return;
	}

	$directory = '';
	$file_name = '';

	if ('inc' == $path[0]) {
		switch ($path[1]) {
			case 'traits':
				$directory = 'traits';
				$file_name = sprintf('trait-%s', trim(strtolower($path[2])));
				break;
			case 'widgets':
			case 'blocks':
				$directory = 'classes';
				$file_name = sprintf('class-%s', trim(strtolower($path[2])));
				break;
			default:
				$directory = 'classes';
				$file_name = sprintf('class-%s', trim(strtolower($path[1])));
				break;
		}
	}
	
	$resource_path = sprintf( '%s/inc/%s/%s.php', untrailingslashit( KNTRTEST_DIR ), $directory, $file_name );

	$is_valid_file = validate_file($resource_path);
	if (!empty($resource_path) 
		&& file_exists($resource_path)
		&& ($is_valid_file === 0 || $is_valid_file == 2)
	) {
		require_once($resource_path);
	}
}

spl_autoload_register('\KNTRTEST\Inc\Helpers\autoloader');
