<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
/* 
    'contact' => [
        'controller' => 'main',
        'action' => 'contact',
    ], */

    'account/login' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],

    'api/addtime' => [
        'controller' => 'api',
        'action' => 'settime',
    ],

/*     'news/show' => [
        'controller' => 'news',
        'action' => 'show',
    ], */
];
