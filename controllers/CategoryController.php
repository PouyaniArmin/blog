<?php
namespace Controllers;

use Core\Controller;

class CategoryController extends Controller{
    public function index(){
        $this->setLayout('dashboard');
        return $this->view('category');
    }
}