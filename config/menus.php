<?php
return[
    'items' => [
        'home'          => ['url' => '/'],
        'areas'         => [
            'route' => 'areas.index',
            'logged' =>true,
            'roles' =>'Admin'
        ],
        'sections'      => [
            'route' => 'sections.index',
            'logged' =>true
        ],
        'models'        => [
            'route' => 'models.index',
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