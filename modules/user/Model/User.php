<?php

namespace Modules\User\Model;

use App\Models\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'id',
        'ip',
        'fullname',
        'username',
        'password',
        'email',
        'phone',
        'forgot_token',
        'active_token',
        'created_at',
        'updated_at'
    ];
    protected $attributes = [
        'ip' => '',
        'fullname' => '',
        'username' => '',
        'password' => '',
        'email' => '',
        'phone' => '',
        'forgot_token' => '',
        'active_token' => ''
    ];

    public function __construct()
    {
        parent::__construct($this->table);
    }
}
