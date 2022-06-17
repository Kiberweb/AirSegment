<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class PrepareXMLService
{
    public function prepare(array $data): string
    {
        if ($data['data'] instanceof UploadedFile) {
            return $data['data']->get();
        }

        return $data['data'];
    }
}
