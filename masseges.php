<?php

return [
    '404' => [
        'icon' => '&#9888',
        'msg' => '404 - Page Not Found',
        'exp' => 'Sorry, the page you are looking for does not exist.',
        'action' => [
            'text' => 'Go to Homepage',
            'href' => "/"
        ]
    ],
    '403' => [
        'icon' => '&#9888',
        'msg' => '403 - Forbidden',
        'exp' => 'you don\'t have permission to access this  page.',
        'action' => [
            'text' => 'Go to Homepage',
            'href' => "/"
        ]
    ],
    'Deleted' => [
        'icon' => '&#128465',
        'msg' => 'Account Deleted',
        'exp' => 'Your account has been deleted successfully.',
        'action' => [
            'text' => 'Go to Homepage',
            'href' => "/"
        ]
    ],
    'Updated' => [
        'icon' => '&#128221',
        'msg' => 'Informations Updated',
        'exp' => 'Your account information has been successfully updated.',
        'action' => [
            'text' => 'Go to Homepage',
            'href' => "/"
        ]
    ],
    'Enrolled' => [
        'icon' => '&#9989',
        'msg' => 'You Enrolled Successfully',
        'exp' => 'Congratulations! You have been successfully enrolled in the course.',
        'action' => [
            'text' => 'Go to Homepage',
            'href' => "/"
        ]
    ],
    'Registered' => [
        'icon' => '&#127881;', // 🎉 Celebration emoji
        'msg' => 'Registration Successful',
        'exp' => 'Welcome! Your account has been created successfully. You can now start learning.',
        'action' => [
            'text' => 'Go to Homepage',
            'href' => "/"
        ]
    ],
];