<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

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

$courses = $db->query("SELECT * FROM courses WHERE title LIKE '%$search%' ORDER BY $orderBy")->get();

view('courses/index.view.php', ['courses' => $courses]);
