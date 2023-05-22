<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND item_exchange.name LIKE '%$name%' ";
}
$sql = "SELECT item_exchange.item_exchange_id AS id, item_exchange.name 
FROM item_exchange 
WHERE item_exchange.active = TRUE 
$filter
ORDER BY item_exchange.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();