<?php
require_once dirname(__DIR__)."/lib.config/config.php";
require_once dirname(__DIR__)."/lib.inc/autoload.php";
require_once __DIR__."/__map__.php";

$request_uri = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : null;
$php_self = isset($_SERVER['PHP_SELF']) ? $_SERVER['PHP_SELF'] : null;


$router = new \Pico\Router\PicoRouter();
$router->parseUri($routing_map, $request_uri, $php_self);

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

$restResponse = new \Pico\Api\PicoRestResponse();

if($router->module != null)
{
	$file = __DIR__ . "/". $router->module;
	if(file_exists($file))
	{
		require_once $file;
	}
}