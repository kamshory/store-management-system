<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND supplier.name like '%$name%' ";
}
$sql = "SELECT supplier.supplier_id, supplier.name 
FROM supplier 
WHERE supplier.active = TRUE 
$filter
ORDER BY supplier.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();