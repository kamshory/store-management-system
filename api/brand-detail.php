<?php
$brand_id = $router->escapeSql($router->getParam('brand_id'));
$sql = "SELECT brand.*
FROM brand 
WHERE brand.active = TRUE 
AND brand.brand_id = '$brand_id'
";
$data = $database
    ->executeQuery($sql)
    ->fetch(\PDO::FETCH_ASSOC);
print_r($data);