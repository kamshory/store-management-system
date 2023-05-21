<?php
$id = $router->getParam('id', true);
$sql = "SELECT supplier.*
FROM supplier 
WHERE supplier.active = TRUE 
AND supplier.supplier_id = '$id'
";
$data = $database->fetchAssoc($sql);
$restResponse->sendJSON($data, true);
exit();