<?php
//require 'config.php'; 
$masseges = require(base_path('masseges.php'));

$msg= $masseges[$_GET['name']];
if(!$msg) abort(Core\Response::NOT_FOUND);
else
view('alert.view.php',$msg);

