<?php


use Core\Response;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$email=$_SESSION['user']['email'];

$infos = $db->query(
    'SELECT id,firstname, lastname, email,phone,birthdate,avatar FROM users WHERE email=:email',

    [
        'email'=> $email
    ]
)->findOrFail();



if ($infos['email'] != $email) abort(Response::FORBIDDEN);

else
    view('profile/index.view.php',$infos);
