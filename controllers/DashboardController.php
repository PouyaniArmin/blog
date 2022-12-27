<?php

namespace Controllers;

use Core\Authentication;
use Core\Controller;
use Core\Database;
use Core\Model;
use Core\Request;
use PDO;
use PDOException;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        session_start();
        if ($_SESSION['login'] === true) {
            $this->setLayout('dashboard');
            return $this->view('dashboard');
        }
        $db = new Database();
        $model = new Model;
        if ($request->post()) {
            $model->set_data($request->body());
            if ($model->validation()) {
                $body = $request->body();
                $email = $body['email'];
                $password = $body['password'];
                if ($db->login($email, $password)) {
                    $this->setLayout('dashboard');
                    return $this->view('dashboard');
                }
                return $this->view('sign', $db->errors);
            }
            return $this->view('sign', $model->errors);
        }
        return $this->view('sign');
    }

    public function dashboardCheck(Request $request){        
        session_start();
        if ($_SESSION['login'] === true) {
            $this->setLayout('dashboard');
            //view session
            return $this->view('dashboard');
        }
        $db = new Database();
        $model = new Model;
        if ($request->post()) {
            $model->set_data($request->body());
            //nacessary validate for form
            if ($model->validation()) {
                $body = $request->body();
                $email = $body['email'];
                $password = $body['password'];
                if ($db->login($email, $password)) {
                    $this->setLayout('dashboard');
                    //view controller
                    return $this->view('dashboard');
                }
                //view controller
                return $this->view('sign', $db->errors);
            }
            //view controller
            return $this->view('sign', $model->errors);
        }
        //view
        return $this->view('sign');       
    }
}