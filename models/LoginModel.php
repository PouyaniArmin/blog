<?php

namespace Models;

use Core\ModelOne;
use Core\Models;

class LoginModel extends Models
{

    public string $email='';
    public string $password='';


    public function rules(): array
    {
        return [
            'email'=>[self::RULE_REQUIRED,[self::RULE_EMAIL]],
            'password'=>[self::RULE_REQUIRED]
        ];
    }

}
