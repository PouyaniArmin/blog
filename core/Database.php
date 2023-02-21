<?php

namespace Core;

use Dotenv\Dotenv;
use Faker\Factory;
use PDO;
use PDOException;

class Database extends FakerFactory{
    protected PDO $conn;
    protected string $host;
    protected string $username;
    protected string $password;
    protected string $dbname;
    private function envLoad(){
        $dotenv=Dotenv::createImmutable(Application::$ROOT_PATH);
        $dotenv=$dotenv->load();
    }
    private function dnsInitialize(){
     $this->envLoad();
     $dbconfig=Config::dbConfig();
     $this->host=$dbconfig['host'];
     $this->username=$dbconfig['db_username'];
     $this->password=$dbconfig['db_password'];
     $this->dbname=$dbconfig['db_table'];
    }
    public function __construct()
    {
        $this->dnsInitialize();
        try{    
            $this->conn=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }
    public function select(){
        $stmt=$this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC); 
        var_dump($result);
    }
    public function insert(){
        $stmt=$this->conn->prepare("INSERT INTO `users`(`username`, `email`, `password`,`data_created`) VALUES (:username,:email,:pass,:current_data)");
        $stmt->bindValue(':username','ali');
        $stmt->bindValue(':email','ali@gmial.com');
        $stmt->bindValue(':pass','12345');
        $stmt->bindValue(':current_data',date('Y-m-d H:i:s'));
        $stmt->execute();
        echo "New Recored created successfully";
    }


    public function insertProduct(){
    $faker=Factory::create();
        for($i=0;$i<=10;$i++){
        $stmt=$this->conn->prepare(
        "INSERT INTO `products`(`name`, `price`, `summary`, `description`) 
        VALUES (:name, :price,:summary,:description)");
        $stmt->bindValue(':name',$faker->name());
        $stmt->bindValue(':price',$faker->randomNumber(3));
        $stmt->bindValue(':summary',$faker->text(50));
        $stmt->bindValue(':description',$faker->text());
        $stmt->execute();
        }
        echo "New Recoreds created successfully";
        exit;
    }
    
}