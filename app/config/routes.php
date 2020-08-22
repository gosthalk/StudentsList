<?php

return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    '{page:\d+}' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'search' => [
        'controller' => 'main',
        'action' => 'search',
    ],

    'search/{page:\d+}' => [
        'controller' => 'main',
        'action' => 'search',
    ],

    'add' => [
        'controller' => 'main',
        'action' => 'add',
    ],

    'edit' => [
        'controller' => 'main',
        'action' => 'edit',
    ],

    'delete' => [
        'controller' => 'main',
        'action' => 'delete'
    ],

];