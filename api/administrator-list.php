<?php
$name = $router->getParam('name', true);
$filter = "";
if($name != null)
{
    $filter .= " AND LOWER(administrator.name) LIKE LOWER('%$name%') ";
}
$sql = "SELECT administrator.* 
FROM administrator 
WHERE administrator.active = TRUE 
$filter
";
$data = $database->fetchAssocAll($sql);
$restResponse->sendJSON($data, true);
exit();