<?php

use Slim\App;

return function (App $app) {
    $_ENV['APP_ENV'] = 'local';
    $_ENV['JWT_SECRET'] = 'a45ed6cb5ed19f2379290f74170c182ec693223b5a3cda521bcefa35558abe2c';
};
