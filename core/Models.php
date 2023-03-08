<?php

namespace Core;

use PHPUnit\Framework\SelfDescribing;

abstract class Models extends Database
{

    public const RULE_REQUIRED = 'required';
    public const RULE_EMAIL = 'email';
    public const RULE_MIN = 'min';
    public const RULE_MAX = 'max';
    public const RULE_MATCH = 'match';

    public array $errors = [];

    public function loadData(array $data)
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    abstract public function rules(): array;



    public function validate()
    {
        foreach ($this->rules() as $attribute => $rules) {
            $value = $this->{$attribute};
            foreach ($rules as $rule) {
                $ruleName = $rule;
                if (!is_string($rule)) {
                    $ruleName = $rule[0];
                }
                if ($ruleName === self::RULE_REQUIRED && !$value) {
                    $this->addError($attribute, self::RULE_REQUIRED);
                }
                if ($ruleName === self::RULE_EMAIL && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $this->addError($attribute, self::RULE_EMAIL);
                }
                if ($ruleName === self::RULE_MIN && strlen($value) < $rule['min']) {
                    $this->addError($attribute,self::RULE_MIN);
                }
                if ($ruleName === self::RULE_MAX && strlen($value) > $rule['max']) {
                    $this->addError($attribute,self::RULE_MAX);
                }
                if ($ruleName === self::RULE_MATCH && $value!== $this->{$rule['match']}) {
                    $this->addError($attribute,self::RULE_MATCH);
                }
            }
        }
        return empty($this->errors);
    }



    public function addError($attribute, $rule)
    {

        $message=$this->message()[$rule]?? '';
        $this->errors[$attribute][]=$message;
    }

    public function message(): array
    {
        return [
            self::RULE_REQUIRED => 'This field is Required',
            self::RULE_EMAIL => 'This field must be valid email address',
            self::RULE_MIN => 'Min lenght of this field must be 6',
            self::RULE_MAX => 'Min lenght of this field must be 16',
            self::RULE_MATCH => 'This is field must be the same as password match'
        ];
    }
}
