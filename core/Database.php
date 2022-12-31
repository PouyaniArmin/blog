<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    protected const EMAIL = 'email';
    protected const PASSWORD = 'password';
    protected $conn;
    public array $db_errors;
    public function __construct()
    {
        $server = '127.0.0.1';
        $username = 'root';
        $password = '';
        $db = 'weblog';
        try {
            $this->conn = new PDO("mysql:host=$server;dbname=$db", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERROR : " . $e->getMessage();
        }
    }
    public function select(string $table)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $table");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<pre>";
        var_dump($result);
        echo "</pre>";
    }
    public function insert($name){
        //insert to database
        $stmt=$this->conn->prepare("INSERT INTO category(`name`) VALUES(:name)");
        $stmt->execute(array('name'=>$name));
    }

    public function login($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user['password'] === $password) {
                // echo "login";
                session_start();
                $_SESSION['login']=true;
            } else {
                $this->addErrorMessage(self::PASSWORD);
            }
        } else {
            $this->addErrorMessage(self::EMAIL);
        }
        return empty($this->db_errors);
    }
    public function addErrorMessage($attribute)
    {
        foreach ($this->message() as $item => $value) {
            if ($attribute == $item) {
                $this->db_errors[$attribute] = $value;
            }
        }
    }
    public function message()
    {
        return [
            self::EMAIL => 'This is not found Email',
            self::PASSWORD => 'wrong password please try again'
        ];
    }
}
