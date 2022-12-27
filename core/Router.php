<?php 
namespace Core;

class Router{
    protected Request $request;
    protected Response $response;
    protected string $main_layout;
    protected array $routes;
    public function __construct(Request $request,Response $response)
    {
        $this->request=$request;
        $this->response=$response;
    }

    public function get($path,$callback){
        $this->routes['get'][$path]=$callback;
    }
    public function post($path,$callback){
        $this->routes['post'][$path]=$callback;
    }

    public function callback(){
        $path=$this->request->path();
        $method=$this->request->method();
        return $callback=$this->routes[$method][$path] ?? false;
    }

    public function resolve(){
        $callback=$this->callback();
        if ($callback===false) {
            $this->response->codeStatus(404);
            return $this->renderView("_404");
        }
        if (is_string($callback)) {
            $this->layout='main';
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            // $callback[0]=new $callback[0];
            Application::$app->controller=new $callback[0];
            $callback[0]=Application::$app->controller;
        }
        return call_user_func($callback,$this->request);
    }
    public function renderView($view,$parmas=[]){
        $layout=$this->renderLayout();
        $view=$this->renderOnlyView($view,$parmas);
        return str_replace("{{content}}",$view,$layout);
        
    }
    public function renderLayout(){
        if (!isset(Application::$app->controller->layout)) {
            $layout='main';
        }else {
            $layout=Application::$app->controller->layout;
        }
        ob_start();
        require "./views/layouts/$layout.php";
        return ob_get_clean();
    }
    public function renderOnlyView($view,$parmas){
        foreach($parmas as $key=>$value){
            $$key=$value;
        }
        ob_start();
        require "./views/".$view.".php";
        return ob_get_clean();
    }
}
