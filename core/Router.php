<?php

namespace Core;
session_start();
class Router
{

    protected Request $request;
    protected static array $routes;
    protected static array $authentication;
    
    public function __construct(Request $request)
    {
        $_SESSION['logined']=false;
        $this->request = $request;
    }

    public static function get($path, $callback,$auth='guest')
    {
        self::$routes['get'][$path] = $callback;
        self::$authentication[$auth]=$path;
    }

    public static function post($path, $callback)
    {
        self::$routes['post'][$path] = $callback;
    }
    public function middleware(){
        return self::$authentication;
    }

    private function callbcak()
    {
        $path = $this->request->path();
        $method = $this->request->method();
        $callback = self::$routes[$method][$path];
        return $callback;
    }

    public function resolve()
    {

        $callback = $this->callbcak() ?? false;
        if ($callback === false) {
            echo "Not Found";
            exit;
        }
        if (is_string($callback)) {
            return $this->renderView($callback);
        }
        if (is_array($callback)) {
            Application::$app->controller = new $callback[0];
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        $contentView = $this->renderOnlyView($view, $params);
        $conentlayout = $this->renderLayout();
        return str_replace("{{content}}", $contentView, $conentlayout);
    }

    public function renderLayout()
    {
        ob_start();
        $layout=Application::$app->controller->layout;
        if (isset($layout)) {
            
        require_once "./views/layouts/$layout.php";
        }else{
        require_once "./views/layouts/main.php";
        }
        return ob_get_clean();
    }


    public function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require_once "./views/$view.php";
        return ob_get_clean();
    }
}
