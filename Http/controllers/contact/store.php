<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::string($_POST['firstn'], 1, 30)) {
    $errors['firstn'] = 'first name should be btween 1-30';
}

if (! Validator::string($_POST['lastn'], 1, 30)) {
    $errors['lastn'] = 'last name should be btween 1-30';
}

if (! Validator::email($_POST['email'])) {
    $errors['email'] = 'email is not true';
}

if (! Validator::string($_POST['phone'], 1, 30)) {
    $errors['phone'] = 'inncorrect phone number';
}

if (! Validator::string($_POST['country'], 1, 20)) {
    $errors['country'] = 'country name should be btween 1-20 .';
}

if (! in_array($_POST['expertise'], ['AI', 'programming', 'networks'])) {
    $errors['expertise'] = 'invalid expertise.';
}

if (! Validator::string($_POST['content'], 1, 500)) {
    $errors['content'] = 'A content btween 1-500 is required.';
}

if (! empty($errors)) {
    return view("contact.view.php", [
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO messages(first_name ,last_name, email, phone, country, expertise, content)
            VALUES( :first_name, :last_name, :email, :phone, :country, :expertise, :content)', [
    'first_name' => $_POST['firstn'],
    'last_name' => $_POST['lastn'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'country' => $_POST['country'],
    'expertise' => $_POST['expertise'],
    'content' => $_POST['content']
]);

header('location: /contact');
die();


//anouther way:
// $data = [
//     'first_name' => $_POST['firstn'] ?? null,
//     'last_name' => $_POST['lastn'] ?? null,
//     'email' => $_POST['email'] ?? null,
//     'phone' => $_POST['phone'] ?? null,
//     'country' => $_POST['country'] ?? null,
//     'expertise' => $_POST['expertise'] ?? null,
//     'content' => $_POST['content'] ?? null
// ];

// $sql = 'INSERT INTO messages (first_name ,last_name, email, phone, country, expertise, content)
//         VALUES (:first_name, :last_name, :email, :phone, :country, :expertise, :content)';

// $db->query($sql, $data);

