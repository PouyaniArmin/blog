<?php
namespace Controllers;

use Core\Authentication;
use Core\Controller;
use Core\Database;
use Core\Model;
use Core\Request;

class CategoryController extends Authentication{
    public function index(Request $request){
        
        $model=new Model();
        $db=new Database();
        if ($request->post()) {
            $body=$request->body();
            $model->set_data($body);
            if ($model->validation()) {
                $data=['success'=>"add category"];
                $this->setLayout('dashboard');
                //add insert to database
                return $this->view('category',$data);
            }
         $this->setLayout('dashboard');
         return $this->view('category',$model->errors);   
        }
        return $this->authorization($request,$request->body(),'category');
    }
}