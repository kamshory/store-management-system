<?php
require_once __DIR__."/__router__.php";

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
$restResponse->sendJSON($data, true);
exit();