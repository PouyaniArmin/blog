<?php

namespace Controllers;

use Core\Controller;
use Core\Request;
use Models\LoginModel;
use Models\RegisterModel;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isPost()) {
            $login = new LoginModel($request->body());
            if ($login->validate()) {
            }
        }
        return $this->view('login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()) {
            $register = new RegisterModel($request->body());
            if ($register->validate()) {
             echo "test";
            }

            return $this->view('register',$register->errors);
            
        
        }
        return $this->view('register');
    }
}
