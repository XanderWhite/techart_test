<?php
return [
    '/' => [
        'controller' => 'NewsController',
        'method' => 'index'
    ],
    '/page/(\d+)' => [
        'controller' => 'NewsController',
        'method' => 'index'
    ],
    '/news/(\d+)' => [
        'controller' => 'NewsController',
        'method' => 'show'
    ]
];
