<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/api/todos' => [
            [['_route' => 'app_todo_create', '_controller' => 'App\\Controller\\TodoController::create'], null, ['POST' => 0], null, false, false, null],
            [['_route' => 'app_todo_index', '_controller' => 'App\\Controller\\TodoController::index'], null, ['GET' => 0], null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/api/todos/([^/]++)(?'
                    .'|(*:64)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        64 => [
            [['_route' => 'app_todo_show', '_controller' => 'App\\Controller\\TodoController::show'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'app_todo_update', '_controller' => 'App\\Controller\\TodoController::update'], ['id'], ['PUT' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
