<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardsAndCertificationUpdateRequest extends FormRequest
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
            'images' => ['image', 'max:1024', 'nullable'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:2048', 'string'],
            'link' => ['nullable', 'max:255', 'string'],
        ];
    }
}
