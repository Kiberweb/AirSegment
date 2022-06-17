<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class RoundTripRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'data' => [
                function ($attribute, $value, $fail) {
                    if (!is_string($value) && !($value instanceof UploadedFile)) {
                        $fail('The '.$attribute.' must either be a string or file.');
                    }
                }
            ],
            'type' => 'nullable',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'type' => $this->type ?: 'xml',
        ]);
    }
}
