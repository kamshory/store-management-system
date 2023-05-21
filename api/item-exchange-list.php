<?php
require_once __DIR__."/__router__.php";

$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND item_exchange.name like '%$name%' ";
}
$sql = "SELECT item_exchange.* 
FROM item_exchange 
WHERE item_exchange.active = TRUE 
$filter
ORDER BY item_exchange.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();