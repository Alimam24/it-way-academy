<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class UpdateprofileForm
{
    protected $errors = [];
    protected $changedFields=[];

    public function __construct(public array $attributes ,public array $newattributes)
    {




        $this->changedFields = self::diff($attributes, $newattributes);

        foreach ($this->changedFields as $key => $value) {
            // Validate first and last name length
            if (($key == 'firstname' || $key == 'lastname') && !Validator::string($value, 1, 30)) {
                $this->error($key, ucfirst($key) . ' should be between 1-30 characters');
            }
            
            // Validate email format
            if ($key == 'email' && !Validator::email($value)) {
                $this->error($key, 'Email is not valid');
            }
    
            // // Validate password strength
            // if ($key == 'password' && !Validator::password($value)) {
            //     $this->error($key, 'Password must be at least 8 characters long, with at least one uppercase letter and one number');
            // }

            // Validate phone number
            if ($key == 'phone' && !Validator::string($value, 10, 11)) {
                $this->error($key, 'phone nubmer isn\'t complete');
            }

            // // Validate birthdate 
            // if ($key == 'phone' && !Validator::string($value, 10, 11)) {
            //     $this->error($key, 'phone nubmer isn\'t complete');
            // }

            // // Validate avatar
            // if ($key == 'avatar' && !Validator::string($value, 10, 11)) {
            //     $this->error($key, '');
            // }
        }

    }

    public function diff($attributes ,$newattributes){
        $infostoUpdate = array_diff($newattributes, $attributes);
        return $infostoUpdate?? false;
    }

    public static function validate($attributes,$newattributes)
    {
        $instance = new static($attributes,$newattributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function getChangedFields(){
        return $this->changedFields;
    }
   

    public function failed(){
         return count($this->errors);
    }

    public function throw(){
        ValidationException::throw($this->errors(),$this->newattributes);
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