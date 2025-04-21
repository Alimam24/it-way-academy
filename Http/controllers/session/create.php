<?php
use Core\session;
view('session/create.view.php', [
    'errors' => Session::get('errors')
]);