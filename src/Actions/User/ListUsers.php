<?php

namespace App\Actions\User;

use App\Actions\Action;
use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ListUsers extends Action
{
    protected function action() {
        $users = User::all();
        return $this->respondWithData(['users' => $users]);
    }
}
