<?php

namespace Modules\User\Service\Impl;

use Core\Service\BaseService;
use Modules\User\Repository\Impl\UserRepository;
use Modules\User\Service\IUserService;

class UserService extends BaseService implements IUserService
{
    protected $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
        parent::__construct($this->userRepo);
    }

    public function listUser()
    {
        return $this->userRepo->findAll();
    }
}
