<?php 
namespace Core;
use Models\Models;
class Application{
  public static $ROOT_PATH;
  public Request $request;
  public Router $router;
  public Controller $controller;
  public Session $session;
  public static Application $app; 
  public function __construct($path)
  {
    self::$app=$this;
    self::$ROOT_PATH=$path;
    $this->request=new Request;
    $this->router=new Router($this->request);
    $this->session=new Session;
  }
  public function getController():Controller{
    return $this->controller;
  }
  public function setController(Controller $controller){
    $this->controller=$controller;
  }
  public function run(){
      echo $this->router->resolve();
  }
}