<?php

$config = require('config.php');
$basePath=$config['basePath'];


$fullUri = parse_url($_SERVER['REQUEST_URI'])['path']; //for returning the path only without the quary (base dir +uri)
$uri = str_replace($basePath, '', $fullUri);   // Remove base path from URI before checking routes (fullUri-base dir)
  

$routes = require('routes.php');

//for redirecting to the apropriat file
function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) { //if the Uri exsist than bring its path
        require $routes[$uri];
    } else {
       abort();        
       
    }
}

function abort($code = 404) {
    http_response_code($code);             //return the http response with the givin code 
    require "views/{$code}.php";         //display the "not exist" page

    die();
}

routeToController($uri, $routes);
