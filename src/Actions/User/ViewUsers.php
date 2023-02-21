<?php

namespace App\Actions\User;

use App\Actions\Action;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ViewUsers extends Action
{
    protected function action() {
        $userId = (int) $this->resolveArg('id');
        return $this->respondWithData(['User' => $userId]);
    }
}
