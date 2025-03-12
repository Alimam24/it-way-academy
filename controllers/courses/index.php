<?php


$config = require base_path('config.php');
$db = new Core\Database($config['database']);

$search = isset($_GET['search']) ? $_GET['search'] : ''; 
$sortOption = isset($_GET['sort']) ? $_GET['sort'] : 'title';
$orderBy = 'title ASC';

switch ($sortOption) {
    case 'students':
        $orderBy = 'students DESC';
        break;
    case 'rating':
        $orderBy = 'rating DESC';
        break;
    case 'price':
        $orderBy = 'price ASC';
        break;
}

$courses=$db->query("SELECT * FROM courses WHERE title LIKE '%$search%' ORDER BY $orderBy")->get();

viewarr('courses/index.view.php',$courses);

