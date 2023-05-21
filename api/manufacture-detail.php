<?php
$id = $router->getParam('id', true);
$sql = "SELECT manufacture.*
FROM manufacture 
WHERE manufacture.active = TRUE 
AND manufacture.manufacture_id = '$id'
";
$data = $database->fetchAssoc($sql);
$restResponse->sendJSON($data, true);
exit();