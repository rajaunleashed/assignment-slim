<?php

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->get('/', function (ServerRequestInterface $request, ResponseInterface $response) {
        $response->getBody()->write('Hello, World!');

        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', \App\Actions\User\ListUsers::class);
        $group->get('/{id}', \App\Actions\User\ViewUsers::class);
    });
};
