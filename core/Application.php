<?php 
namespace Core;

use Controllers\AboutController;
use Controllers\HomeControllers;
use Dotenv\Dotenv;
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
    return $this->models->data();  
  }
  public function router(){
    $path='/';
    $method='get';
    $callback=$this->routes[$method][$path];
    $data=$this->models();
    $this->renderView($callback,$data);
    
    $this->models->loadData($_GET);

    // return call_user_func($callback,$data);
  }

  public function renderView($view,$parmas=[]){
    foreach($parmas as $key=>$value){
      $$key=$value;
    }
    require_once "./views/$view.php";
  }
  public function run(){
    $this->db->connect();
  }

  public function dbConfig(){
    $dotenv=Dotenv::createImmutable(self::$ROOT_PATH);
    $dotenv->safeLoad();
  }
  public function database(){
    $config=$this->dbConfig();
    $server=$config['host'];
    $username=$config['db_username'];
    $password=$config['db_password'];
    $dbName=$config['db_table'];
    try{
    $conn=new PDO("mysql:host=$server;dbname=$dbName",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "connect successfully";
    }catch(PDOException $e){
      echo "Error: ".$e->getMessage();
    }
  }
}