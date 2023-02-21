<?php

namespace Core;


//connect with database
class Models
{

    public const RULE_REQUIERD = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    protected array $data;
    public array $errors;
    public function __construct($data)
    {
        $this->data = $data;
    }


    public function validate()
    {
        foreach ($this->data as $key => $value) {
            if (!$value) {
                $this->errors[$key] = self::RULE_REQUIERD;
            } else {
                if ($key == 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[$key] = "Email Invalid";
                }
                if ($key == 'password' && strlen($value) < 5) {
                    $this->errors[$key] = "Password must be 6 character";
                }
                if ($key == 'password' && strlen($value) > 16) {
                    $this->errors[$key] = "Password should not be more than 16 character";
                }
                if ($this->data['confirmPassword']!==$this->data['password']) {
                    $this->errors['confirmPassword'] = "Password does not match";
                }
            }
        }
        return empty($this->errors);
    }

}
