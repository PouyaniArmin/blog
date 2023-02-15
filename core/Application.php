<?php 
namespace Core;

use Controllers\AboutController;
use Controllers\HomeControllers;
use Dotenv\Dotenv;
use Faker\Factory;
use Models\Models;
use PDO;
use PDOException;
use PHPUnit\Util\ThrowableToStringMapper;

class Application{
  public array $routes;
  public array $data;
  public static $ROOT_PATH;
  protected Models $models;
  protected Database $db;
  public static Application $app; 

  public function __construct($path)
  {
    require "./vendor/fakerphp/faker/src/autoload.php";
    self::$app=$this;
    self::$ROOT_PATH=$path;
    $this->models=new Models;
    $this->db=new Database;  
  }

  protected function path(){
    return $_SERVER['REQUEST_URI'] ?? '';
  }

  public function get($path,$callback){
    $this->routes['get'][$path]=$callback;
  }

  public function models(){
  }
  public function router(){
    $path='/';
    $method='get';
    $callback=$this->routes[$method][$path];
    $data=$this->models();
    $this->renderView($callback,$data);
    
    // return call_user_func($callback,$data);
  }

  public function renderView($view,$parmas=[]){
    foreach($parmas as $key=>$value){
      $$key=$value;
    }
    require_once "./views/$view.php";
  }
  public function run(){
    $faker=Factory::create();
    $name=$faker->text();
    echo $name;
  }

}