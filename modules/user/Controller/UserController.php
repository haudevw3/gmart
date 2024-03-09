<?php

namespace Modules\User\Controller;

use Core\Build\Controller;
use Core\Build\Request;
use Core\Build\Response;
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
        $request = new Request();
        $method = $request->isMethod('post');
        // echo '<pre>';
        // echo '</pre>';
        $response = new Response();
        $response->redirect();
        // $data = [
        //     'listUser' => $this->userService->listUser()
        // ];
        // return parent::view('index', $data);
    }
}
