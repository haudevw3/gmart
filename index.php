<?php
session_start();

use App\App;

require_once 'app/Configs/regex.php';
require_once 'app/Configs/app.php';
require_once 'vendor/autoload.php';

$app = new App();
$app->runApp();

require_once 'resources/views/layouts/desktop-1.php';
