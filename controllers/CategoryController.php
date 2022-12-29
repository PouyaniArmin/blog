<?php

namespace Controllers;

use Core\Authentication;
use Core\Database;
use Core\Model;
use Core\Request;

class CategoryController extends Authentication
{

    public function index(Request $request)
    {
        return $this->authorization($request, $request->body(), 'category');
    }
    
    public function create(Request $request)
    {
        if ($request->post()) {
            $model = new Model();
            $db = new Database();
            if ($request->post()) {
                $body = $request->body();
                $model->set_data($body);
                if ($model->validation()) {
                    $this->setLayout('dashboard');
                    $db->insert($body['name']);
                    $data = ['success' => "add category"];
                    return $this->view('category', $data);
                }
                $this->setLayout('dashboard');
                return $this->view('category', $model->errors);
            }
        }
    }
}
