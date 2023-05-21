<?php
$id = $router->getParam('id', true);
$sql = "SELECT warehouse.*
FROM warehouse 
WHERE warehouse.active = TRUE 
AND warehouse.warehouse_id = '$id'
";
$data = $database->fetchAssoc($sql);
$restResponse->sendJSON($data, true);
exit();