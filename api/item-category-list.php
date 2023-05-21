<?php
$name = $router->escapeSql($router->getParam('name'));
$filter = "";
if($name != null)
{
    $filter .= " AND item_category.name like '%$name%' ";
}
$sql = "SELECT item_category.*
FROM item_category 
WHERE item_category.active = TRUE 
$filter
";
$data = $database->fetchAssocAll($sql);
print_r($sql);