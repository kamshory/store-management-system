<?php
$id = $router->getParam('id', true);
$sql = "SELECT administrator.*
FROM administrator 
WHERE administrator.active = TRUE 
AND administrator.administrator_id = '$id'
";
$data = $database->fetchAssoc($sql);
$restResponse->sendJSON($data, true);
exit();