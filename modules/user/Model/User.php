<?php

namespace Modules\User\Model;

use App\Models\Model;

class User extends Model
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct($this->table);
    }
}
