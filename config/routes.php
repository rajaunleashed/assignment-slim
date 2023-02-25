<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use \App\Controllers\User\UserController;
use \App\Controllers\Location\LocationController;
use \App\Controllers\Transaction\TransactionController;

return function (App $app) {
    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });

    $app->group('/api', function (Group $group) {

        $group->group('/users', function (Group $group) {
            $group->post('', [UserController::class, 'store']);
            $group->put('/{id}', [UserController::class, 'update']);
            $group->get('', [UserController::class, 'all']);
            $group->get('/{id}', [UserController::class, 'getById']);
            $group->delete('/{id}', [UserController::class, 'delete']);
        });

        $group->group('/transactions', function (Group $group) {
            $group->get('', [TransactionController::class, 'getTransactions']);
        });

        $group->group('/locations', function (Group $group) {
            $group->get('', [LocationController::class, 'all']);
            $group->get('/{id}', [LocationController::class, 'getById']);
        });

    });

};
