<?php 
namespace Controllers;

use Core\Controller;

class SocialMedaiController extends Controller{
    public function index(){
     $this->setLayout('dashboard');
     return $this->view('scoialMedia');   
    }
}