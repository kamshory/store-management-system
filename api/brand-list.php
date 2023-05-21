<?php
$name = $router->escapeSql($router->getParam('name'));
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
(new \Pico\Api\PicoRestResponse())->sendOutput(json_encode($data), 'json');