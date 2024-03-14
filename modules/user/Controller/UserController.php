<?php

namespace Modules\User\Controller;

use App\Http\Controllers\Controller;
use Modules\User\Service\UserService;

class UserController extends Controller
{
    protected $module = 'user';
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    protected function setModule()
    {
        return $this->module;
    }

    public function index()
    {
        // var_dump($this->userService);
        // echo '<pre>';
        // print_r($validated);
        // echo '</pre>';
        // $request = new Request();
        // $validated = $request->validate([
        //     'username' => 'required|min:6|max:30|one',
        //     'password' => 'required|min:6|max:30'
        // ], [
        //     'username' => 'Tên đăng nhập',
        //     'password' => 'Mật khẩu'
        // ]);
        // if ($validated['isValidate']) :
        //     return parent::view('index');
        // else:
        //     $data = [
        //         'errors' => $validated
        //     ];
        //     parent::view('add', $data);
        // endif;
        return parent::view('index');
    }

    public function add()
    {
        // parent::view('add');
        // $request = new Request();
        // $validated = $request->validate([
        //     'username' => 'required|min:6|max:30|one',
        //     'password' => 'required|min:6|max:30'
        // ], [
        //     'username' => 'Tên đăng nhập',
        //     'password' => 'Mật khẩu'
        // ]);
        // if ($validated['isValidate']) :
        //     return parent::view('index');
        // else:
        //     $data = [
        //         'errors' => $validated
        //     ];
        //     parent::view('add', $data);
        // endif;
        parent::view('add');
    }
}
