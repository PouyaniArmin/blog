<?php 
namespace Controllers;

use Core\Controller;

class HomeControllers extends Controller{
    public function index(){
        return $this->view('home');
    }
}