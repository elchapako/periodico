<?php
return[
    'items' => [
        'home'          => ['url' => '/'],
        'config'        => [
            'submenu' => [
                'areas'         => [
                    'route' => 'areas.index',
                ],
                'sections'      => [
                    'route' => 'sections.index',
                ],
                'models'        => [
                    'route' => 'models.index',
                ],
            ],
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