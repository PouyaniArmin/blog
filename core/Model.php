<?php

namespace Core;

class Model
{


    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email invalid';
    public const RULE_PASSWORD = 'password';
    public const RULE_MIN = '6';
    public const RULE_MATCH = 'match';
    public array $errors;
    protected array $data;
    protected $pass;
    public function get_data(): array
    {
        return $this->data;
    }
    public function set_data(array $data)
    {
        $this->data = $data;
    }
    public function validation()
    {
        foreach ($this->get_data() as $attribute => $value) {
            // echo $attribute."=>".$value."<br>";
            if ($value === '') {
                $this->addError($attribute, self::RULE_REQUIRED);
            }
            if ($attribute === 'email') {
                if ($value != '') {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $this->addError($attribute, self::RULE_EMAIL);
                    }
                }
            }
            if ($attribute === 'password') {
                if (strlen($value) >= 1 && strlen($value) < 5) {
                    $this->addError($attribute, self::RULE_MIN);
                }
                $this->pass = $value;
            }
            if ($attribute === 'confirmPassword') {
                if (strlen($value) >= 1 && strlen($value) < 5) {
                    $this->addError($attribute, self::RULE_MIN);
                }
            }
            if ($attribute === 'confirmPassword') {
                $repass = $value;
                if (strcmp($this->pass, $repass) !== 0) {
                    $this->addError($attribute, self::RULE_MATCH);
                }
            }
        }
        empty($this->pass);
        return empty($this->errors);
    }
    public function addError($attribute, $rule)
    {
        foreach ($this->message() as $item => $value) {
            if ($rule == $item) {
                $message = $value;
            }
        }
        $this->errors[$attribute] = $message;
    }
    public function message()
    {
        return [
            self::RULE_REQUIRED => 'this is field requierd',
            self::RULE_EMAIL => 'this is Email invalid',
            self::RULE_MIN => 'must be 6 character',
            self::RULE_MATCH => 'this is not match '
        ];
    }
}
