<?php 
namespace Core;
class Session{


    public function getRedirect():string{
        if ($_SESSION['page']===null) {
            $_SESSION['page']='dashboard';
        }
        return $_SESSION['page'];
    }
    public function setRedirect($view){
    $_SESSION['page']=$view;     
    }

    public function initi_login($login){
        $_SESSION['login']=$login;
    }

    public function login_initial(){
        return $_SESSION['login'];
    }

}


?>