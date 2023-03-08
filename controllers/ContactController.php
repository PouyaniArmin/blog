<?php 
namespace Controllers;

use Core\Controller;

class ContactController extends Controller{

    public function index(){
        return $this->view('contact');
    }
}