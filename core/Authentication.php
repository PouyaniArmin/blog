<?php

namespace Core;

class Authentication extends Controller
{
    public function authorization(Request $request, array $params, $dv,$layout='dashboard')
    {
        return $this->session_login_check($request,$params,$dv);
    }

    //check session login database keep view admin
    public function session_login_check($request,$params,$view){

        if ($_SESSION['login'] === true) {
            $this->setLayout('dashboard');
            return $this->view($view);
        }
            return $this->validate_check($request,$params,$view);
    }
    //validate form and show errors form
    public function validate_check(Request $request,array $params,$view)
    {
        $model=new Model;
        if ($request->post()) {
            $model->set_data($request->body());
            if ($model->validation($params)) {
                return $this->login($params['email'],$params['password'],$view);
            }
            return $this->view('sign',$model->errors);
        }
        return $this->view('sign');
    }

    //check account for loing(email and password)
    public function login($email,$password,$view){
        //create object
        $db=new Database();
        //call login check database
        if ($db->login($email,$password)) {
            $this->setLayout('dashboard');
            return $this->view($view);
        }
        return $this->view('sign',$db->db_errors);
    }
}
