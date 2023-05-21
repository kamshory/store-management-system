<?php
$id = $database->escapeSQL($router->getParam('id'));
$sql = "SELECT manufacture.*
FROM manufacture 
WHERE manufacture.active = TRUE 
AND manufacture.manufacture_id = '$id'
";
$data = $database->fetchAssoc($sql);
(new \Pico\Api\PicoRestResponse())->sendJSON($data, true);
exit();