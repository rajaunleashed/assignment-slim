<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use \App\Controllers\User\UserController;

return function (App $app) {
    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->post('', [UserController::class, 'store']);
        $group->put('/{id}', [UserController::class, 'update']);
        $group->get('', [UserController::class, 'all']);
        $group->get('/{id}', [UserController::class, 'getById']);
    });
};
