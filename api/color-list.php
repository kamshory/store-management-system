<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND color.name LIKE '%$name%' ";
}
$sql = "SELECT color.* 
FROM color 
WHERE color.active = TRUE 
$filter
ORDER BY color.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();