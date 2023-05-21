<?php

require_once dirname(__DIR__)."/lib.config/config.php";
require_once dirname(__DIR__)."/lib.inc/autoload.php";

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
$php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : null;

$map = array(
    '/' => 'home.php',
    '/brand/list' => 'brand-list.php',
    '/brand/detail/{brand_id}' => 'brand-detail.php',
    '/item/detail/{item_id}' => 'item-detail.php',
    '/item/code/{code}' => 'item-detail.php'
);

$router = (new \Pico\Router())->parseUri($map, $request_uri, $php_self);
$database = new \Pico\Database\PicoDatabase(
	(new \Pico\Database\PicoDatabaseCredentials())->load($databaseConfigs->config_file),
	new \Pico\Database\PicoDatabaseSyncConfig(
		$syncConfigs->sync_database_application_dir,
		$syncConfigs->sync_database_base_dir,
		$syncConfigs->sync_database_pool_name,
		$syncConfigs->sync_database_rolling_prefix,
		$syncConfigs->sync_database_extension,
		$syncConfigs->sync_database_maximum_length,
		$syncConfigs->sync_database_delimiter
	)
);

$database->connect();

$file = __DIR__ . "/". $router->module;

require_once $file;