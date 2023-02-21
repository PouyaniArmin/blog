<?php

namespace Core;

class Router
{

    protected Request $request;
    protected static array $routes;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public static function get($path, $callback)
    {
        self::$routes['get'][$path] = $callback;
    }

    public static function post($path, $callback)
    {
        self::$routes['post'][$path] = $callback;
    }


    private function callbak()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $callback = self::$routes[$method][$path];
        return $callback;
    }

    public function resolve()
    {
        $callback = $this->callbak() ?? false;
        if ($callback===false) {
            echo "Not Found";
            exit;
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller=new $callback[0];
            $callback[0]=Application::$app->controller;
        }

        return call_user_func($callback,$this->request);
    }

    public function renderView($view,$params=[]){
        foreach($params as $key=>$value){
            $$key=$value;
        }
        require_once "./views/$view.php";
    }

}
