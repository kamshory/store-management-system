<?php
$routing_map = array(
    '/' => 'home.php',

    '/brand/list/{name}' => 'brand-list.php',
    '/brand/detail/{id}' => 'brand-detail.php',

    '/manufacture/list/{name}' => 'manufacture-list.php',
    '/manufacture/detail/{id}' => 'manufacture-detail.php',

    '/item/detail/{id}' => 'item-detail.php',
    '/item/code/{code}' => 'item-detail.php',
	'/item-category/list/{name}' => 'item-category-list.php'
);
