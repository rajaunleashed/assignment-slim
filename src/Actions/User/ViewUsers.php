<?php

namespace App\Actions\User;

use App\Actions\Action;
use App\Models\User;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ViewUsers extends Action
{
    protected function action() {
        $userId = (int) $this->resolveArg('id');
        $user = User::find($userId);
        return $this->respondWithData(['User' => $user]);
    }
}
