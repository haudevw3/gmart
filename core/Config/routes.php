<?php
/**
 * đường dẫn ảo => [
 *      đường dẫn thật
 *      tên controller
 *      tên phương thức
 * ]
 */
$pathApp = 'app/Http/Controller/';
$routes = [
    'trang-chu' => [
        'path' => $pathApp,
        'controller' => 'HomeController',
        'method' => 'index'
    ],

    'san-pham' => [
        'path' => $pathApp,
        'controller' => 'ProductController',
        'method' => 'index',
        
        'danh-sach' => [
            'method' => 'list'
        ]
    ]
];