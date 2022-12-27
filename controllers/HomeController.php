<?php 
namespace Controllers;

use Core\Application;
use Core\Controller;

class HomeController extends Controller{
    public function index(){
       return $this->view('home');
    }
}