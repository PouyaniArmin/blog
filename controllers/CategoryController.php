<?php

namespace Controllers;

use Core\Authentication;
use Core\Controller;
use Core\Database;
use Core\Model;
use Core\Request;

class CategoryController extends Authentication
{
    public function index(Request $request)
    {

        $model = new Model();
        $db = new Database();
        if ($request->post()) {
            $body = $request->body();
            $model->set_data($body);
            if ($model->validation()) {
                $this->setLayout('dashboard');
                //add insert to database
                $db->insert($body['name']);
                $data = ['success' => "add category"];
                return $this->view('category', $data);
            }
            $this->setLayout('dashboard');
            return $this->view('category', $model->errors);
        }
        return $this->authorization($request, $request->body(), 'category');
    }
}
