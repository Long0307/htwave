<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InquiryStoreRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'email'],
            'phoneNumber' => ['required', 'max:255', 'string'],
            'enquiries' => ['required', 'max:255', 'string'],
        ];
    }
}
