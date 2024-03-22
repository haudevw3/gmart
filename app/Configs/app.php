<?php

use Core\Middleware\UserAuth;
use Modules\User\Provider as UserProvider;

const BASE_URL = 'http://localhost:8080/gmart';

$providers = [
    'user' => UserProvider::class
];

$auths = [
    'dang-nhap' => UserAuth::class
];
