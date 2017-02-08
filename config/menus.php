<?php
return[
    'items' => [
        'home'          => ['url' => '/'],
        'areas'         => [
            'route' => 'areas.index',
            'logged' =>true,
            'roles' => 'Admin',
        ],
        'sections'      => [
            'route' => 'sections.index',
            'logged' =>true
        ],
        'models'        => [
            'route' => 'models.index',
            'logged' =>true
        ],
        'editions'      => [
            'route' => 'editions.index',
            'logged' =>true
        ],
        'assigned notes' => [
            'route' => 'assigned-notes.index',
            'logged' =>true
        ],
        'notes'         => [
            'route' => 'notes.index',
            'logged' =>true
        ],
        'pages'         => [
            'route' => 'pages.index',
            'logged' => true
        ],
        'publicity'     => [
            'submenu' => [
                'advertising' => [
                    'route' => 'ads.index'
                ],
                'clients' => [
                    'route' => 'clients.index'
                ],
                'sizes' => [
                    'route' => 'sizes.index'
                ]
            ],
            'logged' =>true
        ]
    ]
];