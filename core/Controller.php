<?php 
namespace Core;
class Controller{
    public $layout="main";
    public function setLayout(string $layout){
        $this->layout=$layout;
    }
    public function view($view,$params=[]){
        return Application::$app->router->renderView($view,$params);
    }
    public function dashboardView($view,$layout,$params=[]){
        if ($_SESSION['login']===true) {
            $this->setLayout($layout);
            return Application::$app->router->renderView($view,$params);
        }
    }
}