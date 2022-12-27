<?php

namespace Controllers;

use Core\Controller;
use Core\Model;
use Core\Request;

class RegisterController extends Controller
{
    public function index(Request $request)
    {
        $model=new Model;
        if ($request->post()) {
            $model->set_data($request->body());
            if ($model->validation()) {
                //view register;
                // check database
                return $this->view('dashboard');
            }
            return $this->view('register',$model->errors);
        }
        return $this->view('register');
    }
 
}
