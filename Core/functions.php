<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = 404)
{
    http_response_code($code);

    header("Location: /alert?name=$code");

    die();
}


function authorize($condition, $status = Core\Response::FORBIDDEN) {
    if (! $condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require base_path('views/' . $path);
}

function viewarr($path, $attributes = [])
{
    $data=$attributes;
    require base_path('views/' . $path);
}

function style($path)
{
    return  "/styles/". $path;
}

