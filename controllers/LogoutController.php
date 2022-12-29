<?php 
namespace Controllers;

use Core\Controller;

class LogoutController extends Controller{
    public function index(){
        $this->setLayout('main');
        session_start();
        if(isset($_SESSION['login'])){
            session_destroy();
        }
        header("location:/");
    }
}