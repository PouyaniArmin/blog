<?php 
namespace Core;

use Controllers\UserController;

class Authentication extends Controller{

    public function __construct($view){
        Application::$app->session->setRedirect($view);
        if (!Application::$app->session->login_initial()) {
         return $this->redirecctTo('login');
        }
     }

     public function set_after_login_view(){
        if (Application::$app->session->login_initial()) {
            return $this->redirecctTo(Application::$app->session->getRedirect());
        }
     }

}