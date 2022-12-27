<?php 
namespace Controllers;

use Core\Controller;

class SettingController extends Controller{
    public function index(){
        $this->setLayout('dashboard');
        return $this->view('settings');
    }
}

?>