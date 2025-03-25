<?php


$router->get('/', 'controllers/index.php');


$router->get('/register','controllers/registration/create.php')->only('guest');
$router->post('/register','controllers/registration/store.php');

$router->get('/login','controllers/session/create.php')->only('guest');
$router->post('/session','controllers/session/store.php');
$router->delete('/session','controllers/session/destroy.php')->only('auth');

$router->get('/courses', 'controllers/courses/index.php');
$router->get('/courses/infos', 'controllers/courses/infos.php');
$router->get('/courses/create','controllers/courses/create.php');


$router->get('/profile' , 'controllers/profile/index.php')->only('auth');
$router->get('/profile/update','controllers/profile/update.php')->only('auth');
$router->delete('/profile','controllers/profile/destroy.php');


$router->get('/alert','controllers/alert.php');


$router->get('/contact','controllers/contact/create.php');
$router->post('/contact','controllers/contact/store.php');

// $router->get('/about', 'controllers/about.php');