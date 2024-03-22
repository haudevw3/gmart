<?php

namespace Modules\User\Controller;

use App\Facades\Session;
use App\Facades\View;
use App\Http\Controllers\Controller;
use Modules\User\Request\FormLogin;
use Modules\User\Request\FormRegister;
use Modules\User\Service\LoginService;
use Modules\User\Service\RegisterService;
use Modules\User\Service\UserService;

class UserController extends Controller
{
    protected $userService;
    protected $loginService;
    protected $registerService;

    public function __construct(UserService $userService, LoginService $loginService, RegisterService $registerService)
    {
        $this->userService = $userService;
        $this->loginService = $loginService;
        $this->registerService = $registerService;
    }

    public function login()
    {
        $data = [
            'content' => View::getFilePath('form-login')
        ];
        return view('viewLogin', $data);
    }

    public function loginInfo()
    {
        $request = new FormLogin();
        $validated = $request->validated();
        if ($validated['isValidated']) :
            $data = $request->all();
            $isVerify = $this->loginService->login($data);
            if ($isVerify) :
                echo 'trang-chu';
            endif;
        else :
            $isVerify = false;
        endif;
        if (!$isVerify) :
            $error = ['message' => 'Tên đăng nhập hoặc mật khẩu không hợp lệ. Vui lòng thử lại hoặc sử dụng chức năng quên mật khẩu'];
            Session::set('errors', $error);
            Session::set('old', $request->all());
            return redirectRoute('login-page');
        endif;
    }

    public function register()
    {
        $data = [
            'content' => View::getFilePath('form-register')
        ];
        return view('viewRegister', $data);
    }

    public function registerInfo()
    {
        $request = new FormRegister();
        $validated = $request->validated();
        if ($validated['isValidated']) :
            $data = $request->all();
            $isCreate = $this->registerService->createOne($data);
            if ($isCreate) :
                return redirectRoute('register-login');
            endif;
        else :
            Session::set('old', $request->all());
            Session::set('errors', $request->errors($validated));
            return redirectRoute('register-page');
        endif;
    }
}
