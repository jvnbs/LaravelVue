<?php 
// config/dompdf.php

return [
    // ...

    'font_dir' => storage_path('fonts'),
    'font_cache' => storage_path('fonts'),
    'default_font' => 'Poppins',

    'redis' => [

  

    'client' => env('REDIS_CLIENT', 'predis'),

  

    'options' => [

        'cluster' => env('REDIS_CLUSTER', 'redis'),

        'prefix' => env('REDIS_PREFIX', ''),

    ],

  

    'default' => [

        'url' => env('REDIS_URL'),

        'host' => env('REDIS_HOST', '127.0.0.1'),

        'password' => env('REDIS_PASSWORD', null),

        'port' => env('REDIS_PORT', 6379),

        'database' => env('REDIS_DB', 0),

    ],

  

    'cache' => [

        'url' => env('REDIS_URL'),

        'host' => env('REDIS_HOST', '127.0.0.1'),

        'password' => env('REDIS_PASSWORD', null),

        'port' => env('REDIS_PORT', 6379),

        'database' => env('REDIS_CACHE_DB', 1),

    ],

  

],
];

