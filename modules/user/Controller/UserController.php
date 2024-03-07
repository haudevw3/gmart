<?php

namespace Modules\User\Controller;

use Core\Build\Controller;
use Modules\User\Service\Impl\UserService;

class UserController extends Controller
{
    protected $module = 'user';
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    protected function setModule()
    {
        return $this->module;
    }

    public function index()
    {
        $data = [
            'listUser' => $this->userService->findAll()
        ];
        return parent::view('index', $data);
    }
}
