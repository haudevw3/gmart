<?php

namespace Modules\User\Service\Impl;

use Core\Service\BaseServiceImpl;
use Modules\User\Repository\UserRepository;
use Modules\User\Service\LoginService;

class LoginServiceImpl extends BaseServiceImpl implements LoginService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        parent::__construct($userRepo);
    }

    public function login($data = [])
    {
        $condition = ['username' => $data['username']];
        $fields = ['username', 'password'];
        $user = $this->baseRepo->findOne($condition, $fields);
        if ($data['username'] == $user['username'] && password_verify($data['password'], $user['password'])) :
            return true;
        else :
            return false;
        endif;
    }
}
