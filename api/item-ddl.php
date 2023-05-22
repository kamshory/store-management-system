<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND LOWER(item.name) LIKE LOWER('%$name%') ";
}
$sql = "SELECT item.item_id AS id, item.name 
FROM item 
WHERE item.active = TRUE 
$filter
ORDER BY item.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();