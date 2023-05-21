<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND administrator.name like '%$name%' ";
}
$sql = "SELECT administrator.administrator_id, administrator.name 
FROM administrator 
WHERE administrator.active = TRUE 
$filter
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();