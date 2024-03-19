<?php

namespace Modules\User\Controller;

use App\Facades\Response;
use App\Facades\Session;
use App\Facades\View;
use App\Http\Controllers\Controller;
use Modules\User\Request\FormLogin;
use Modules\User\Service\UserService;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $request = new FormLogin();
        $validated = $request->validated();
        // echo '<pre>';
        // print_r($request->all());
        // echo '</pre>';
    }

    public function add()
    {
    }
}
