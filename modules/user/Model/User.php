<?php

namespace Modules\User\Model;

use Core\Build\Model;

class User extends Model
{
    protected $table = 'users';

    protected function setTable()
    {
        return $this->table;
    }
}
