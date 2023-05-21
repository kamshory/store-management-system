<?php
$id = $router->getParam('id', true);
$sql = "SELECT brand.*
FROM brand 
WHERE brand.active = TRUE 
AND brand.brand_id = '$id'
";
$data = $database->fetchAssoc($sql);
$restResponse->sendJSON($data, true);
exit();