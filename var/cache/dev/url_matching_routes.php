<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/\\.well\\-known/genid/([^/]++)(*:43)'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:78)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:108)'
                        .'|contexts/([^.]+)(?:\\.(jsonld))?(*:147)'
                        .'|todos(?'
                            .'|(?:\\.([^/]++))?(*:178)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:212)'
                            .'|(?:\\.([^/]++))?(*:235)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:269)'
                        .')'
                    .')'
                .')'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:308)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        78 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        108 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        147 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        178 => [[['_route' => '_api_/todos{._format}_get_collection', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Todo', '_api_operation_name' => '_api_/todos{._format}_get_collection'], ['_format'], ['GET' => 0], null, false, true, null]],
        212 => [[['_route' => '_api_/todos/{id}{._format}_get', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Todo', '_api_operation_name' => '_api_/todos/{id}{._format}_get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        235 => [[['_route' => '_api_/todos{._format}_post', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Todo', '_api_operation_name' => '_api_/todos{._format}_post'], ['_format'], ['POST' => 0], null, false, true, null]],
        269 => [[['_route' => '_api_/todos/{id}{._format}_put', '_controller' => 'api_platform.action.placeholder', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Todo', '_api_operation_name' => '_api_/todos/{id}{._format}_put'], ['id', '_format'], ['PUT' => 0], null, false, true, null]],
        308 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
