<?php

$today = date("Y-m-d");

return [
    'version' => '2.0',
    'permissions' => [
        'User' => [
            'View user',
            'Create user',
            'Edit user',
            'Activate/deactivate user'
        ]
    ],
];
