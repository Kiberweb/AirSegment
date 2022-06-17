<?php

namespace App\Services;

class BuildRouteTripService
{
    private array $breakPoint = [];
    private string $currentPoint = '';
    private string $routeTrip;

    public function build(array $routes): string
    {
        $this->startRoute($routes);

        foreach($routes as $route) {
            if ($this->currentPoint === $route['board']) {
                $this->routeTrip .= ' - ' . $route['off'];
                $this->currentPoint = $route['off'];
            } else {
                $this->routeTrip .= ' обратно ' . $route['board'] . ' - ' . $route['off'];
                $this->breakPoint[] = $this->currentPoint;
                $this->currentPoint = $route['off'];
            }
        }

        $this->showBreakPoints();

        return $this->routeTrip;
    }

    public function startRoute(array &$routes): void
    {
        $this->routeTrip = $routes[0]['board'] . ' - ' . $routes[0]['off'];
        $this->currentPoint = $routes[0]['off'];
        unset($routes[0]);
    }

    public function showBreakPoints(): void
    {
        foreach ($this->breakPoint as $point) {
            $this->routeTrip .= ' ' . $point . ' - точка разрыва; ';
        }
    }
}
