<?php
$item_id = $router->escapeSql($router->getParams('item_id'));
$code = $router->escapeSql($router->getParams('code'));
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
$data = $database
    ->executeQuery($sql)
    ->fetch(\PDO::FETCH_ASSOC);
print_r($sql);