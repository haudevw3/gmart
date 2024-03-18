<?php

namespace Modules\User\Controller;

use App\Facades\Response;
use App\Facades\Session;
use App\Facades\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
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
        return View::make('index');
        // var_dump($view->view);
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
        // else :
        //     $data = [
        //         'old' => $request->old(),
        //         'errors' => $request->errors()
        //     ];
        //     parent::view('add', $data);
        // endif;
        // Session::set('login', ['username'=>'vanhau']);
        // // Session::delete('login');
        // echo '<pre>';
        // var_dump(Session::get('login'));
        // echo '</pre>';
        // echo 'index';
    }

    public function add()
    {
        // Response::redirect('thanh-vien/danh-sach');
        // parent::view('add');
        // echo 'add';
    }
}
