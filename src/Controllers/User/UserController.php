<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\User;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class UserController extends BaseController
{
    /**
     * @method store
     * @param Request $request
     * @param Response $response
     */

    public function store(Request $request, Response $response)
    {
        $body = $request->getParsedBody();

        $validations = validateUser($body);

        if (count($validations)) {
            return $this->respondWithData($response, ['errors' => $validations], 422);
        }

        $user = User::where('email', $body['email'])->first();
        if ($user) {
            return $this->respondWithData($response, ['message' => 'Email Already Taken'], 409);
        }

        $newUser = new User();
        $newUser->first_name = $body['first_name'];
        $newUser->last_name = $body['last_name'];
        $newUser->email = $body['email'];
        $newUser->save();

        return $this->respondWithData($response, ['message' => 'User added successfully']);
    }
    /**
     * @method all
     * @param Request $request
     * @param Response $response
     */
    public function all(Request $request, Response $response) {
        $users = User::with('location')->get();
        return $this->respondWithData($response, ['users' => $users]);
    }


    /**
     * @method getById
     * @param Request $request
     * @param Response $response
     * @param $params
     */

    public function getById(Request $request, Response $response, $params)
    {
        $userId = (int) $params['id'];
        $user = User::find($userId);
        return $this->respondWithData($response, ['user' => $user]);
    }


    /**
     * @method getById
     * @param Request $request
     * @param Response $response
     * @param $params
     */

    public function update(Request $request, Response $response, $params)
    {
        $body = $request->getParsedBody();
        $userId = (int) $params['id'];
        $user = User::find($userId);
        $user->first_name = $body['first_name'] ?? $user->first_name;
        $user->last_name = $body['last_name'] ?? $user->last_name;
        $user->email = $body['email'] ?? $user->email;
        $user->save();
        return $this->respondWithData($response, ['message' => 'User updated successfully'], 201);
    }
}
