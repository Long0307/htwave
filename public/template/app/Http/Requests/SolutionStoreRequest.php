<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolutionStoreRequest extends FormRequest
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
            'Background1' => ['image', 'max:1024', 'required'],
            'Slogan' => ['required', 'max:255', 'string'],
            'Background2' => ['image', 'max:1024', 'required'],
            'Title' => ['required', 'max:255', 'string'],
            'Description' => ['required', 'max:255', 'string'],
            'Content' => ['required', 'max:255', 'string'],
        ];
    }
}
