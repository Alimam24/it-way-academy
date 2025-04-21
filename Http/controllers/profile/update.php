<?php

use Core\UpdatingService;
use Core\Response;
use Core\App;
use Core\Database;
use Http\Forms\UpdateprofileForm;
use Core\Session;

$db = App::resolve(Database::class);

$email = $_SESSION['user']['email'];

$attributes = $db->query(
    'SELECT firstname, lastname, email,phone,birthdate,avatar FROM users WHERE email=:email',

    [
        'email' => $email
    ]
)->findOrFail();


if ($attributes['email'] != $email) abort(Response::FORBIDDEN);


$form = UpdateprofileForm::validate($attributes, $newattributes = [
    'firstname' => $_POST['firstname'],
    'lastname' => $_POST['lastname'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'birthdate' => $_POST['birthdate'],
    'avatar' => $fileName = !empty($_FILES['avatar']['name']) ? $_FILES['avatar']['name'] : $_POST['existing_avatar']
]);

$updated = (new UpdatingService())->attempt($form->getChangedFields(), $email);


if (!$updated) {
    $form->error(
        'email',
        'This Email is already used.'
    )->throw();
   
}

redirect('/profile');
