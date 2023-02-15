<?php 
namespace Controllers;
class HomeControllers{
    public function __construct()
    {
        require "./views/home.php";
    }
    public function index(){
        echo "test";
    }
}