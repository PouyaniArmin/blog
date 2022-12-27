<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    protected const EMAIL = 'email';
    protected const PASSWORD = 'password';
    protected $conn;
    public array $errors;
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
                $this->addError(self::PASSWORD);
            }
        } else {
            $this->addError(self::EMAIL);
        }
        return empty($this->errors);
    }
    public function addError($attribute)
    {
        foreach ($this->message() as $item => $value) {
            if ($attribute == $item) {
                $this->errors[$attribute] = $value;
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
