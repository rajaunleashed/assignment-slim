<?php

// Should be set to 0 in production
error_reporting(E_ALL);

// Should be set to '0' in production
ini_set('display_errors', '1');

// Settings
$settings = [
    "db" => [
        'driver' => 'mysql',
        'host' => '127.0.0.1',
        'database' => 'assignment',
        'username' => 'root',
        'password' => '123123Aa@',
        'collation' => 'utf8_general_ci',
        'charset' => 'utf8',
        'prefix' => ''
    ],
];

// ...

return $settings;
