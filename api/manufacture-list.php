<?php
$name = $database->escapeSQL($router->getParam('name'));
$filter = "";
if($name != null)
{
    $filter .= " AND manufacture.name like '%$name%' ";
}
$sql = "SELECT manufacture.manufacture_id, manufacture.name 
FROM manufacture 
WHERE manufacture.active = TRUE 
$filter
ORDER BY manufacture.sort_order ASC
";
$data = $database->fetchAssocAll($sql);
(new \Pico\Api\PicoRestResponse())->sendJSON($data, true);
exit();