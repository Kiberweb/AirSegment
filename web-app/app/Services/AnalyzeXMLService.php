<?php

namespace App\Services;

use App\Form\AirSegmentForm;

class AnalyzeXMLService
{
    private string $xml;

    public function get(string $xml): void
    {
        $this->xml = $xml;
    }

    public function analyze(): array
    {
        $listSegments = [];

        try {
            $routes = new \SimpleXMLElement($this->xml);
            $segments = $routes->AirSegments->AirSegment;

            foreach($segments as $segment) {
                $form = new AirSegmentForm($segment);
                $form->throwOnValidate();

                $listSegments[] = [
                    'departure' => strtotime($segment->Departure['Date'] . ' ' . $segment->Departure['Time']),
                    'arrival' => strtotime($segment->Arrival['Date'] . ' ' . $segment->Arrival['Time']),
                    'board' => explode('/', $segment->Board['City'])[0],
                    'off' => explode('/', $segment->Off['City'])[0],
                ];
            }

        } catch (\Exception $e) {
            print 'Error analyze xml details' . $e->getMessage();
        }

        return $listSegments;
    }
}
