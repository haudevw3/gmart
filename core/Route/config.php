<?php
/**
 * đường dẫn ảo => [
 *      đường dẫn thật
 *      tên controller
 *      tên phương thức
 * ]
 */
$pathApp = 'app/Http/Controllers/';
$routes = [
    'trang-chu' => [
        'path' => $pathApp,
        'name' => 'HomeController',
        'method' => 'index'
    ],

    'san-pham' => [
        'path' => $pathApp,
        'name' => 'ProductController',
        'method' => 'index',
        
        'danh-sach' => [
            'method' => 'list'
        ]
    ]
];