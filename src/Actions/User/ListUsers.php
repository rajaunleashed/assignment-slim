<?php

namespace App\Actions\User;

use App\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ListUsers extends Action
{
    protected function action() {
        return $this->respondWithData(['data' => 'All Users']);
    }
}
