<?php

namespace App\Controllers;

class BaseController
{
    private $response;

    /**
     * @param array|object|null $data
     */
    protected function respondWithData($response, $data = null, $statusCode = 200)
    {
        $this->response = $response;
        $this->data = $data;
        $this->statusCode = $statusCode;

        $payload = new ActionPayload($statusCode, $data);
        return $this->respond($payload);
    }

    protected function respond(ActionPayload $payload)
    {

        $json = json_encode($payload, JSON_PRETTY_PRINT);
        $this->response->getBody()->write($json);

        return $this->response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($payload->getStatusCode());
    }
}
