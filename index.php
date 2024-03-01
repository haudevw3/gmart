<?php
require_once './vendor/autoload.php';
require_once './core/Config/routes.php';
require_once './core/Config/database.php';

use Core\Build\DB;
use Core\Build\Route;

$data = [
    'name' => 'Tủ lạnh 2',
    'slug' => 'ti-vi',
    'image' => 'test',
    'parent_id' => 0
];

// DB::table('categories')->where('name', '=', 'Tủ lạnh')->delete();
// echo '<br>';

echo '<pre>';
print_r(DB::table('categories')->get());
echo '</pre>';

