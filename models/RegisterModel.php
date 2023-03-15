<?php 

namespace Models;

use Core\ModelOne;
use Core\Models;

class RegisterModel extends Models{
    public string $username='';
    public string $email='';
    public string $password='';
    public string $confirmPassword='';
    public function rules():array{
        return [
            'username'=>[self::RULE_REQUIRED],
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED,[self::RULE_MIN,'min'=>6],[self::RULE_MAX,'max'=>16]],
            'confirmPassword'=>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'password']]
        ];
    }
}