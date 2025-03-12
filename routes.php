<?php


$router->get('/', 'controllers/index.php');
// $router->get('/about', 'controllers/about.php');
// $router->get('/contact', 'controllers/contact.php');

$router->get('/courses', 'controllers/courses/index.php');
$router->get('/courses/infos', 'controllers/courses/infos.php');

$router->get('/profile' , 'controllers/profile/index.php');
$router->get('/profile/update','controllers/profile/update.php');
$router->delete('/profile','controllers/profile/destroy.php');


$router->get('/alert','controllers/alert.php');

$router->get('/contact','controllers/contact.php');