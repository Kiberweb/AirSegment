<?php

namespace App\Services;

class ResponseDataService
{
    private string $type;

    public function response(string $data, string $name = 'routes')
    {
        if ($this->type === 'xml') {
            return response('<' . $name . '>' . $data . '<' . $name . '/>')->header('Content-Type', 'text/xml');
        }

        return response()->json([$name => $data]);
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }
}
