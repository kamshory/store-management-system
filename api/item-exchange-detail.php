<?php
require_once __DIR__."/__router__.php";

$id = $router->getParam('id', true);
$sql = "SELECT item_exchange.* 
FROM item_exchange 
WHERE item_exchange.active = TRUE 
AND item_exchange.item_exchange_id = '$id' 
";
$data = $database->fetchAssoc($sql);
$restResponse->sendJSON($data, true);
exit();