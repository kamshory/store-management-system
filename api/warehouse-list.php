<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND warehouse.name like '%$name%' ";
}
$sql = "SELECT warehouse.warehouse_id, warehouse.name 
FROM warehouse 
WHERE warehouse.active = TRUE 
$filter
ORDER BY warehouse.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();
