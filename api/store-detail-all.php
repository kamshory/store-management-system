<?php
$id = $router->getParam('id', true);
$sql = "SELECT store.*
FROM store 
WHERE store.active = TRUE 
AND store.store_id = '$id'
";
$data = $database->fetchAssoc($sql, array());
$restResponse->sendJSON($data, true);
exit();
