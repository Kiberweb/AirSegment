<?php
namespace App\Form;

use App\Exceptions\FormValidationException;

class AirSegmentForm
{
    private \SimpleXMLElement $item;

    public function __construct(\SimpleXMLElement $item)
    {
        $this->item = $item;
    }

    /**
     * @throws FormValidationException
     */
    public function throwOnValidate(): void
    {
        if (empty($this->item->Departure['Date'])) {
            throw new FormValidationException('Departure attribute Date can not be empty');
        }

        if (empty($this->item->Departure['Time'])) {
            throw new FormValidationException('Departure attribute Time can not be empty');
        }

        if (empty($this->item->Arrival['Date'])) {
            throw new FormValidationException('Arrival attribute Date can not be empty');
        }

        if (empty($this->item->Arrival['Time'])) {
            throw new FormValidationException('Arrival attribute Time can not be empty');
        }

        if (empty($this->item->Board['City'])) {
            throw new FormValidationException('Board attribute date can not be empty');
        }

        if (empty($this->item->Off['City'])) {
            throw new FormValidationException('Off attribute date can not be empty');
        }
    }
}
