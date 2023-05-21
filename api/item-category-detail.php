<?php
$item_category_id = $router->escapeSql($router->getParam('item_category_id'));
$sql = "SELECT item_category.*
FROM item_category 
WHERE item_category.active = TRUE 
AND item_category.item_category_id = '$item_category_id'
";
$data = $database->fetchAssoc($sql);
print_r($sql);