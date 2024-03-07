<?php

namespace Modules\User\Repository\Impl;

use Core\Repository\BaseRepository;
use Modules\User\Model\User;
use Modules\User\Repository\IUserRepository;

class UserRepository extends BaseRepository implements IUserRepository
{
    protected function setModel()
    {
        return User::class;
    }
}
