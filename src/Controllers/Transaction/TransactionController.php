<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\Transaction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class TransactionController extends BaseController
{

    /** @method getTransactions
     * @param Request $request
     * @param Response $response
     */

    public function getTransactions(Request $request, Response $response)
    {
        $query = Transaction::query();

        $queryParams = $request->getQueryParams();

        if (isset($queryParams['locationId']))
        {
            $query = $query->where('location_id', $queryParams['locationId']);
        }

        if (isset($queryParams['fromDate']))
        {
            $query = $query->where('date', '>=', $queryParams['fromDate']);
        }

        if (isset($queryParams['toDate']))
        {
            $query = $query->where('date', '<=', $queryParams['toDate']);
        }

        $query = $query->with('location.user');

        $page = $queryParams['page'] ?? 1;
        $transactions = $query->paginate(15, ['*'], 'page', $page);

        return $this->respondWithData($response, ['transactions' => $transactions]);

    }
}
