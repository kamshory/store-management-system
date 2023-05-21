<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND brand.name like '%$name%' ";
}
$sql = "SELECT brand.brand_id, brand.name 
FROM brand 
WHERE brand.active = TRUE 
$filter
ORDER BY brand.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();