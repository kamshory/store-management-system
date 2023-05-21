<?php
$item_id = $router->escapeSql($router->getParam('item_id'));
$code = $router->escapeSql($router->getParam('code'));
$filter = "";
if($item_id != null)
{
    $filter .= " AND item.item_id = '$item_id' ";
}
if($code != null)
{
    $filter .= " AND item.code = '$code' ";
}
$sql = "SELECT item.*
FROM item 
WHERE item.active = TRUE 
$filter
";
$data = $database->fetchAssocAll($sql);
print_r($sql);