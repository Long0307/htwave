<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyUpdateRequest extends FormRequest
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
            'Background' => ['image', 'max:2048'],
            'Slogan' => ['required', 'max:255', 'string'],
            'SubTitle' => ['required', 'max:255', 'string'],
            'Description' => ['required', 'max:255', 'string'],
            'Technology1' => ['nullable','max:10000', 'string'],
            'Technology2' => ['nullable','max:10000', 'string'],
            'Technology3' => ['nullable','max:10000', 'string'],
            'Technology4' => ['nullable','max:10000', 'string'],
            'Technology5' => ['nullable','max:10000', 'string'],
            'Technology6' => ['nullable','max:10000', 'string'],
            'Technology7' => ['nullable','max:10000', 'string'],
            'Technology8' => ['nullable','max:10000', 'string'],
            'Technology9' => ['nullable','max:10000', 'string'],
            'Technology10' => ['nullable','max:10000', 'string'],
            'Technology11' => ['nullable','max:10000', 'string'],
            'Technology12' => ['nullable','max:10000', 'string'],
            'Technology13' => ['nullable','max:10000', 'string'],
            'Technology14' => ['nullable','max:10000', 'string'],
            'Technology15' => ['nullable','max:10000', 'string'],
            'Technology16' => ['nullable','max:10000', 'string'],
            'Technology17' => ['nullable','max:10000', 'string'],
            'Technology18' => ['nullable','max:10000', 'string'],
            'Technology19' => ['nullable','max:10000', 'string'],
            'Technology20' => ['nullable','max:10000', 'string'],
        ];
    }
}
