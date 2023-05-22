<?php
$id = $router->getParam('id', true);
$sql = "SELECT color.*
FROM color 
WHERE color.active = TRUE 
AND color.color_id = '$id'
";
$data = $database->fetchAssoc($sql, array());
$restResponse->sendJSON($data, true);
exit();
