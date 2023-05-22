<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND item_category.name LIKE '%$name%' ";
}
$sql = "SELECT item_category.item_category_id AS id, item_category.name 
FROM item_category 
WHERE item_category.active = TRUE 
$filter
ORDER BY item_category.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();