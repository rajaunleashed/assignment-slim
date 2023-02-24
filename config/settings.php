<?php

// Should be set to 0 in production
error_reporting($_ENV['DEBUG'] ? E_ALL : 0);

// Should be set to '0' in production
ini_set('display_errors', $_ENV['DEBUG']);

// Settings
$settings = [
    "db" => [
        'driver' => 'mysql',
        'host' => $_ENV['HOST'],
        'database' => $_ENV['DATABASE'],
        'username' => $_ENV['USERNAME'],
        'password' => $_ENV['PASSWORD'],
        'collation' => 'utf8_general_ci',
        'charset' => 'utf8',
        'prefix' => ''
    ],
];

// ...

return $settings;
