<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND LOWER(warehouse.name) LIKE LOWER('%$name%') ";
}
$sql = "SELECT warehouse.* 
FROM warehouse 
WHERE warehouse.active = TRUE 
$filter
ORDER BY warehouse.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();
