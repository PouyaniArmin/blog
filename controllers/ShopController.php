<?php
 namespace Controllers;

use Core\Authentication;

 class ShopController extends Authentication{

    public function __construct()
    {
        parent::__construct('dashboard');
        $this->setlayout('dashbordLayout');
    }

    public function index(){
        return $this->view('/shop');
    }
    public function create(){
        return $this->view('newProduct');
    }
 }