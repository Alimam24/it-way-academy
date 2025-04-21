<?php

use Core\RegistrationService;
use Http\Forms\RegisterationForm;


$form = RegisterationForm::validate($attributes = [
    'firstn' => $_POST['firstn'],
    'lastn' => $_POST['lastn'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedUp = (new RegistrationService())->attempt(
    $attributes['firstn'],
    $attributes['lastn'],
    $attributes['email'],
    $attributes['password']
);

if (!$signedUp) {
    $form->error(
        'email', 'this email is already used.')
    ->throw();
}

redirect('/alert?name=Registered');

