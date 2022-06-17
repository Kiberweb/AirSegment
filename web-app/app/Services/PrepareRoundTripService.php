<?php

namespace App\Services;

class PrepareRoundTripService
{
    private $analyzeXMLService;
    private $buildRouteTripService;

    public function __construct(AnalyzeXMLService $analyzeXMLService, BuildRouteTripService $buildRouteTripService)
    {
        $this->analyzeXMLService = $analyzeXMLService;
        $this->buildRouteTripService = $buildRouteTripService;
    }

    public function prepare(string $xml): string
    {
        $this->analyzeXMLService->get($xml);
        $routes = $this->analyzeXMLService->analyze();

        return $this->buildRouteTripService->build($routes);
    }
}
