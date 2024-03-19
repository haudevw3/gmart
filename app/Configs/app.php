<?php

use Core\Middleware\UserAuth;
use Modules\User\Provider as UserProvider;

$providers = [
    'thanh-vien' => UserProvider::class
];

$auths = [
    'dang-nhap' => UserAuth::class
];
