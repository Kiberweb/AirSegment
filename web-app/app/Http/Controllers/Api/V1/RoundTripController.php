<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\PrepareRoundTripService;
use App\Services\PrepareXMLService;
use App\Http\Requests\RoundTripRequest;
use App\Services\ResponseDataService;

class RoundTripController extends Controller
{
    private $prepareRoundTripService;
    private $prepareXMLService;
    private $responseDataService;

    public function __construct(
        PrepareRoundTripService $prepareRoundTripService,
        PrepareXMLService $prepareXMLService,
        ResponseDataService $responseDataService
    ) {
        $this->prepareRoundTripService = $prepareRoundTripService;
        $this->prepareXMLService = $prepareXMLService;
        $this->responseDataService = $responseDataService;
    }

    public function get()
    {

    }

    public function create(RoundTripRequest $roundTripRequest)
    {

        $xml = $this->prepareXMLService->prepare($roundTripRequest->all());

        try {
            $routes = $this->prepareRoundTripService->prepare($xml);

            $this->responseDataService->setType($roundTripRequest->post('type'));

            return $this->responseDataService->response($routes);
        } catch (\Exception $e) {
            return $this->responseDataService->response($e->getMessage(), 'errors');
        }
    }

    public function update(int $id, RoundTripRequest $roundTripRequest)
    {

    }

    public function delete(int $id)
    {

    }
}
