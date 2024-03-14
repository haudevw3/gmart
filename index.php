<?php

use App\Facades\Facade;
use App\Facades\Session;

require_once './app/Configs/regex.php';
require_once './vendor/autoload.php';

Session::start();
$facade = new Facade();
$facade->loadFactory();
$facade->loadRoute();
