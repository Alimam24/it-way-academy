<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class RegisterationForm
{
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        //validation for each input and if error were founed add it to errors array
        if (! Validator::string($attributes['firstn'], 1, 30)) {
            $this->errors['firstn'] = 'first name should be btween 1-30';
        }

        if (! Validator::string($attributes['lastn'], 1, 30)) {
            $this->errors['lastn'] = 'last name should be btween 1-30';
        }

        if (! Validator::email($attributes['email'])) {
            $this->errors['email'] = 'email is not true';
        }

        if (! Validator::password($attributes['password'])) {
            $this->errors['password'] = 'The password must be more than 8 characters long and contain at least one uppercase letter and one number.';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function failed(){
         return count($this->errors);
    }

    public function throw(){
        ValidationException::throw($this->errors(),$this->attributes);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
}
