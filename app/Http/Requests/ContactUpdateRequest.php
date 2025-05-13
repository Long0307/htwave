<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'favicon' => ['image', 'max:1024'],
            'address' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'fax' => ['required', 'max:255', 'string'],
            'logo1' => ['image', 'max:1024'],
            'logo2' => ['image', 'max:1024'],
            'map' => ['string', 'max:2048'],
        ];
    }
}
