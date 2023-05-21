<?php
spl_autoload_register(function ($class) {
	$file_to_include = __DIR__ . "/__classes__/" . $class . ".php";
	$file_to_include = str_replace("\\", "/", $file_to_include);
	if (file_exists($file_to_include)) {
		require_once $file_to_include;
	}
});
