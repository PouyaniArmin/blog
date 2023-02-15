<?php

namespace Core;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class Database{
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
    public function connect()
    {
        $this->dnsInitialize();
        try{    
            $this->conn=new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            echo "connect successfuly";

        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }

    }
}