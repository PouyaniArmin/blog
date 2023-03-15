<?php

namespace Core;

session_start();
class Controller extends Database
{
    public string $auth;
    public string $layout='main';
    public function setlayout(string $layout){
        $this->layout=$layout;
    }
    public function autocation(string $auth){
        $this->auth=$auth;
    }
    public function view($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);    
    }

    public function redirecctTo($view){
        header("Location:$view");
    }
}
