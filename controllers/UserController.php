<?php

namespace Controllers;
session_start();

use Core\Authentication;
use Core\Request;
use Models\LoginModel;
use Models\RegisterModel;


class UserController extends Authentication
{

    public function __construct()
    {
    }
    public $page;

    public function login(Request $request)
    {
        $loinModel = new LoginModel();
        if ($request->isPost()) {
            $loinModel->loadData($request->body());
            if ($loinModel->validate()) {
                $body = $request->body();
                if ($loinModel->logined($body['email'], $body['password'])) {
                    $this->set_after_login_view();
                }   
            }
            return $this->view('login', $loinModel->errors);
        }
        return $this->view('login');
    }



    public function register(Request $request)
    {

        if (isset($_SESSION['login'])) {
            echo "Please logout account atfer register to weblog";
            header('Location:/dashboard');
            exit;
           }

        $register = new RegisterModel($request->body());
        if ($request->isPost()) {
            $register->loadData($request->body());
            if ($register->validate()) {
                echo "success";
            }
            return $this->view('register', $register->errors);
        }
        return $this->view('register');
    }

    public function logout(){
        session_destroy();
        header("Location:/");
    }



}

?>
