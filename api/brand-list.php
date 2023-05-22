<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND LOWER(brand.name) LIKE LOWER('%$name%') ";
}
$sql = "SELECT brand.*
FROM brand 
WHERE brand.active = TRUE 
$filter
ORDER BY brand.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();