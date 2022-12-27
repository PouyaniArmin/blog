<?php 
namespace Core;
use Core\Router;
class Application{
    public static Application $app;
    public Request $request;
    public Response $response;
    public Router $router;
    public Controller $controller;
    public function __construct()
    {
        self::$app=$this;
        $this->request=new Request;
        $this->response=new Response;
        $this->router=new Router($this->request,$this->response);
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