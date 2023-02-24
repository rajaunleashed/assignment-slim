<?php

use Slim\App;

return function (App $app) {
    $_ENV['APP_ENV'] = 'local';
    $_ENV['DEBUG'] = TRUE;
    $_ENV['HOST'] = '127.0.0.1';
    $_ENV['DATABASE'] = 'assignment';
    $_ENV['USERNAME'] = 'root';
    $_ENV['PASSWORD'] = '123123Aa@';
};
