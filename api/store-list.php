<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND store.name like '%$name%' ";
}
$sql = "SELECT store.store_id, store.name 
FROM store 
WHERE store.active = TRUE 
$filter
ORDER BY store.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
(new \Pico\Api\PicoRestResponse())->sendJSON($data, true);
exit();