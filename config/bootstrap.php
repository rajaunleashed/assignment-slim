<?php

use DI\ContainerBuilder;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

// Add DI container definitions
$containerBuilder->addDefinitions(__DIR__ . '/container.php');

// Create DI container instance
$container = $containerBuilder->build();

// Create Slim App instance
$app = $container->get(App::class);

// Register environments
(require __DIR__ . '/env.php')($app);

// Register database
(require __DIR__ . '/database.php')($app);

// Register routes
(require __DIR__ . '/routes.php')($app);

// Register middleware
(require __DIR__ . '/middleware.php')($app);


$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*');
});

return $app;
