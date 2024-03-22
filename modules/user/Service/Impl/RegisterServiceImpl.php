<?php

namespace Modules\User\Service\Impl;

use Core\Service\BaseServiceImpl;
use Modules\User\Repository\UserRepository;
use Modules\User\Service\RegisterService;

class RegisterServiceImpl extends BaseServiceImpl implements RegisterService
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
        parent::__construct($userRepo);
    }

    public function createOne($data = [])
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->baseRepo->createOne($data);
    }
}
