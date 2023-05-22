<?php
$routing_map = array(
    '/' => 'index.php',

    '/brand/ddl/{name}' => 'brand-ddl.php',
    '/brand/list/{name}' => 'brand-list.php',
    '/brand/detail/{id}' => 'brand-detail.php',

    '/color/ddl/{name}' => 'color-ddl.php',
    '/color/list/{name}' => 'color-list.php',
    '/color/detail/{id}' => 'color-detail.php',

    '/item-category/ddl/{name}' => 'item-category-ddl.php',
    '/item-category/list/{name}' => 'item-category-list.php',
    '/item-category/detail/{id}' => 'item-category-detail.php',

    '/item-exchange/ddl/{name}' => 'item-exchange-ddl.php',
    '/item-exchange/list/{name}' => 'item-exchange-list.php',
    '/item-exchange/detail/{id}' => 'item-exchange-detail.php',

    '/item/list-id-parent/{id}' => 'item-list-parent.php',
    '/item/list-id-child/{id}' => 'item-list-child.php',
    '/item/list-code-parent/{code}' => 'item-list-parent.php',
    '/item/list-code-child/{code}' => 'item-list-child.php',
    '/item/list/{name}' => 'item-list.php',
    '/item/detail/{id}' => 'item-detail.php',
    '/item/code/{code}' => 'item-detail.php',

    '/manufacture/ddl/{name}' => 'manufacture-ddl.php',
    '/manufacture/list/{name}' => 'manufacture-list.php',
    '/manufacture/detail/{id}' => 'manufacture-detail.php',

    '/store/ddl/{name}' => 'store-ddl.php',
    '/store/list/{name}' => 'store-list.php',
    '/store/detail/{id}' => 'store-detail.php',
    '/store/detail/{id}/all' => 'store-detail-all.php',

    '/supplier/ddl/{name}' => 'supplier-ddl.php',
    '/supplier/list/{name}' => 'supplier-list.php',
    '/supplier/detail/{id}' => 'supplier-detail.php',

    '/warehouse/ddl/{name}' => 'warehouse-ddl.php',
    '/warehouse/list/{name}' => 'warehouse-list.php',
    '/warehouse/detail/{id}' => 'warehouse-detail.php'
);
