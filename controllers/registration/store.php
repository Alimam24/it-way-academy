<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];
$firstname=$_POST['firstn'];
$lastname=$_POST['lastn'];

$errors = [];

//validation for each input and if error were founed add it to errors array
if (! Validator::string($firstname, 1, 30)) {
    $errors['firstn'] = 'first name should be btween 1-30';
}

if (! Validator::string($lastname, 1, 30)) {
    $errors['lastn'] = 'last name should be btween 1-30';
}

if (! Validator::email($email)) {
    $errors['email'] = 'email is not true';
}

if (! Validator::password($password)) {
    $errors['password'] = 'The password must be more than 8 characters long and contain at least one uppercase letter and one number.';
}



if (!empty($errors)) {
    return view("registration/create.view.php", [
        'errors' => $errors
    ]);
    exit();
}


$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    $errors['email']='this email is already used.';

    return view("registration/create.view.php", [
        'errors' => $errors
    ]);
    exit();
} else {
    $db->query(
        'INSERT INTO users(firstname, lastname, email, password)
                VALUES(:firstname,:lastname,:email,:password)',
        [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => password_hash($password,PASSWORD_BCRYPT),
    
    
        ]
    );

    $_SESSION['user'] = [
        'email' => $email
    ];
    

    header('location: /alert?name=Registered');
die();  
}


