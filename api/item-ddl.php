<?php
$id = $router->getParam('id', true);
$code = $router->getParam('code', true);
$filter = "";
if($id != null)
{
    $filter .= " AND item.item_id = '$id' ";
}
if($code != null)
{
    $filter .= " AND item.code = '$code' ";
}
$sql = "SELECT item.item_id AS id, item.name 
FROM item 
WHERE item.active = TRUE 
$filter
";
$data = $database->fetchAssoc($sql, array());
$restResponse->sendJSON($data, true);
exit();
