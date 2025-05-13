<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyStoreRequest extends FormRequest
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
            'Background' => ['required', 'max:255', 'string'],
            'Slogan' => ['required', 'max:255', 'string'],
            'SubTitle' => ['required', 'max:255', 'string'],
            'Description' => ['required', 'max:255', 'string'],
            'categories_id' => ['required', 'max:255'],
        ];
    }
}
