<?php

use Core\Database;
use Core\Response;

$config = require base_path('config.php');
$db = new Database($config['database']);

$infos = $db->query(
    'SELECT id,firstname, lastname, email,phone,birthdate,avatar FROM user WHERE firstname = :first && lastname= :last',

    [
        'first' => $_GET['first'],
        'last' => $_GET['last']
    ]
)->findOrFail();

$currentUserId = 1;

if ($infos['id'] != $currentUserId) abort(Response::FORBIDDEN);

else
    view('profile/index.view.php',$infos);
