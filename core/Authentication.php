<?php

namespace Core;

class Authentication extends Controller
{
    public function authorization(Request $request, array $params, $dv,$layout='dashboard')
    {
        //session start for login
       
        if ($_SESSION['login'] === true) {
            $this->setLayout('dashboard');
            return $this->view($dv);
        }
        /** create object
         * object Model for validate
         * object db(database) for login check 
         */
        $model = new Model;
        $db = new Database();
        if ($request->post()) {
            $model->set_data($params);
            if ($model->validation($params)) {
                if ($db->login($params['email'], $params['password'])) {
                    $this->setLayout($layout);
                    return $this->view($dv);
                }
                return $this->view('sign', $db->errors);
            }
            return $this->view('sign', $model->errors);
        }
        return $this->view('sign');
    }
}
