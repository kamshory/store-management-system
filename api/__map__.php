<?php
$routing_map = array(
    '/' => 'index.php',

    '/brand/list/{name}' => 'brand-list.php',
    '/brand/detail/{id}' => 'brand-detail.php',

    '/color/list/{name}' => 'color-list.php',
    '/color/detail/{id}' => 'color-detail.php',

    '/item-category/list/{name}' => 'item-category-list.php',
    '/item-category/detail/{id}' => 'item-category-detail.php',

    '/item-exchange/list/{name}' => 'item-exchange-list.php',
    '/item-exchange/detail/{id}' => 'item-exchange-detail.php',

    '/store/list/{name}' => 'store-list.php',
    '/store/detail/{id}' => 'store-detail.php',

    '/manufacture/list/{name}' => 'manufacture-list.php',
    '/manufacture/detail/{id}' => 'manufacture-detail.php',

    '/item/detail/{id}' => 'item-detail.php',
    '/item/code/{code}' => 'item-detail.php'
);
