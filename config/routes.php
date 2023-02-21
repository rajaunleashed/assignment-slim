<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use \App\Actions\User\ListUsers;
use \App\Actions\User\ViewUsers;

return function (App $app) {
    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsers::class);
    });
    $app->group('/api', function (Group $group) {
        $group->group('/users', function (Group $group) {
            $group->get('/{id}', ViewUsers::class);
        });
    });

};
