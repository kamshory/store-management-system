<?php
$id = $database->escapeSQL($router->getParam('id'));
$code = $database->escapeSQL($router->getParam('code'));
$filter = "";
if($item_id != null)
{
    $filter .= " AND item.item_id = '$id' ";
}
if($code != null)
{
    $filter .= " AND item.code = '$code' ";
}
$sql = "SELECT item.*
FROM item 
WHERE item.active = TRUE 
$filter
";
$data = $database->fetchAssocAll($sql);
(new \Pico\Api\PicoRestResponse())->sendJSON($data, true);
exit();