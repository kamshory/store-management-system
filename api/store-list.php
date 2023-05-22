<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND LOWER(store.name) LIKE LOWER('%$name%') ";
}
$sql = "SELECT store.*
FROM store 
WHERE store.active = TRUE 
$filter
ORDER BY store.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();