<?php

namespace Core;

class RegistrationService
{
    public function attempt($firstname,$lastname,$email, $password)
    {
        if (!$this->emailExist($email)) {
            $this->signup($firstname,$lastname,$email, $password);
            
            (new Authenticator)->login([
                'email'=> $email
            ]);

            return true;
        }
        return false;
    }
    
    public function emailExist($email) {
        $user = App::resolve(Database::class)
            ->query('select * from users where email = :email', [
            'email' => $email
        ])->find();
        
        return $user? true : false;
    }

    public function signup($firstname,$lastname,$email, $password)
    {
        App::resolve(Database::class)
        ->query(
            'INSERT INTO users(firstname, lastname, email, password)
                    VALUES(:firstname,:lastname,:email,:password)',
            [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'password' => password_hash($password,PASSWORD_BCRYPT),
            ]);
           

    }
}

//     public function ()
//     {
//         $_SESSION = [];
//         session_destroy();

//         $params = session_get_cookie_params();
//         setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
//     }
// }