<?php

return [
    'roles_structure' => [
        'superadmin' => [
            'users' => 'c,r,u,d',
            'roles' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'notifications' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
            'settings' => 'u',
            'profile' => 'r,u',
        ],
        'admin' => [
            'users' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'notifications' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'contacts' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
        'user' => [
            'users' => 'c,r,u,d',
            'comments' => 'c,r,u,d',
            'tags' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'contacts' => 'c,r,u,d',
            'profile' => 'r,u',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
