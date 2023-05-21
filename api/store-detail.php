<?php
$id = $router->getParam('id', true);
$sql = "SELECT store.*
FROM store 
WHERE store.active = TRUE 
AND store.store_id = '$id'
";
$data = $database->fetchAssoc($sql);
(new \Pico\Api\PicoRestResponse())->sendJSON($data, true);
exit();