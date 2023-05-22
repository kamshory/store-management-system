<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND LOWER(manufacture.name) LIKE LOWER('%$name%') ";
}
$sql = "SELECT manufacture.manufacture_id, manufacture.name 
FROM manufacture 
WHERE manufacture.active = TRUE 
$filter
ORDER BY manufacture.sort_order ASC
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();