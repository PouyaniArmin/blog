<?php 
namespace Controllers;

use Core\Controller;

class ProductController extends Controller{
    
    public function index(){
        return $this->view('product');
    }
}