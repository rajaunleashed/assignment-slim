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
    'jwt_authentication' => [
        'secret' => $_ENV['JWT_SECRET'],
        'algorithm' => 'HS256',
        'secure' => false, // only for localhost for prod and test env set true
        'error' => static function ($response, $arguments) {
            $data['status'] = 401;
            $data['error'] = 'Unauthorized/'. $arguments['message'];
            return $response
                ->withHeader('Content-Type', 'application/json;charset=utf-8')
                ->getBody()->write(json_encode(
                    $data,
                    JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT
                ));
        }
    ],
];

// ...

return $settings;
