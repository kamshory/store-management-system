<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND store.name LIKE '%$name%' ";
}
$sql = "SELECT store.store_id AS id, store.name 
FROM store 
WHERE store.active = TRUE 
$filter
ORDER BY store.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();