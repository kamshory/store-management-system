<?php
$id = $router->getParam('id', true);
$sql = "SELECT item_category.* 
FROM item_category 
WHERE item_category.active = TRUE 
AND item_category.item_category_id = '$id' 
";
$data = $database->fetchAssoc($sql, array());
$restResponse->sendJSON($data, true);
exit();
