<?php

namespace App\Controllers\Location;

use App\Controllers\BaseController;
use App\Models\Location;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LocationController extends BaseController
{
    /**
     * @method all
     * @param Request $request
     * @param Response $response
     * @param $params
     */
    public function all(Request $request, Response $response)
    {
        $location = Location::all();
        return $this->respondWithData($response, ['locations' => $location]);
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
        $location = Location::find($userId);
        return $this->respondWithData($response, ['location' => $location]);
    }
}
