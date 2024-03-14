<?php

use App\Facades\Facade;

require_once './app/Configs/regex.php';
require_once './vendor/autoload.php';

$facade = Facade::getInstance();
$facade->loadFactory();
$facade->loadRoute();
