<?php


$router->get('/', 'index.php');


$router->get('/register','registration/create.php')->only('guest');
$router->post('/register','registration/store.php');

$router->get('/login','session/create.php')->only('guest');
$router->post('/session','session/store.php');
$router->delete('/session','session/destroy.php')->only('auth');

$router->get('/courses', 'courses/index.php');
$router->get('/courses/infos', 'courses/infos.php');
$router->get('/courses/create','courses/create.php');


$router->get('/profile' , 'profile/index.php')->only('auth');

$router->PATCH('/profile','profile/update.php')->only('auth');

$router->delete('/profile','profile/destroy.php');


$router->get('/alert','alert.php');


$router->get('/contact','contact/create.php');
$router->post('/contact','contact/store.php');

$router->get('/about', 'about.php');