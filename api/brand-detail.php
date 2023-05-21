<?php
$id = $router->getParam('id', true);
$sql = "SELECT brand.*
FROM brand 
WHERE brand.active = TRUE 
AND brand.brand_id = '$id'
";
$data = $database->fetchAssoc($sql);
(new \Pico\Api\PicoRestResponse())->sendJSON($data, true);
exit();