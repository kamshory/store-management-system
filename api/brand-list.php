<?php
$sql = "SELECT brand.brand_id, brand.name 
FROM brand 
WHERE brand.active = TRUE 
ORDER BY brand.sort_order ASC
";
$data = $database
    ->executeQuery($sql)
    ->fetchAll(\PDO::FETCH_ASSOC);
print_r($data);