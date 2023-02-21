<?php

use Slim\App;

return function (App $app) {
    $app->add(new Tuupola\Middleware\JwtAuthentication([
        "path" => "/api/auth", /* or ["/api", "/admin"] */
        "secret" => $_ENV['JWT_SECRET'],
        "algorithm" => ["HS256", "HS384"],
        "error" => function ($response, $arguments) {
            $data["status"] = "error";
            $data["message"] = $arguments["message"];

            $response->getBody()->write(
                json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT)
            );

            return $response->withHeader("Content-Type", "application/json");
        }
    ]));
};
