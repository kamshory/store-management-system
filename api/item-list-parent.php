<?php
$id = $router->getParam('id', true);
$code = $router->getParam('code', true);
$filter = "";
if($id != null)
{
    $filter .= " AND item.item_child = '$id' ";
}
if($code != null)
{
    $filter .= " AND item.item_child = (SELECT i.item_id FROM item AS i WHERE i.code = '$code') ";
}
$sql = "SELECT item.* 
FROM item 
WHERE item.active = TRUE 
AND item.is_pack = TRUE
$filter
ORDER BY item.pack_content ASC
";
$data = $database->fetchAssocAll($sql, array());
$restResponse->sendJSON($data, true);
exit();
