<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND LOWER(item_category.name) LIKE LOWER('%$name%') ";
}
$sql = "SELECT item_category.* 
FROM item_category 
WHERE item_category.active = TRUE 
$filter
ORDER BY item_category.sort_order ASC 
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();