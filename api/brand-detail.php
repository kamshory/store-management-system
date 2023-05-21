<?php
$id = $database->escapeSQL($router->getParam('id'));
$sql = "SELECT brand.*
FROM brand 
WHERE brand.active = TRUE 
AND brand.brand_id = '$id'
";
$data = $database->fetchAssoc($sql);
(new \Pico\Api\PicoRestResponse())->sendJSON($data, true);
exit();