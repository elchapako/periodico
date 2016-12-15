<?php
return[
'items' => [
'home'          => ['url' => '/'],
'areas'         => ['route' => 'areas.index'],
'sections'      => ['route' => 'sections.index'],
'models'        => ['route' => 'models.index', 'roles' => 'admin'],
'publicity'     => ['submenu' => [
                        'advertising'     => ['route' => 'ads.index'],
                        'clients'         => ['route' => 'clients.index'],
                        'sizes'           => ['route' => 'sizes.index']
                        ]
                    ]
]
];