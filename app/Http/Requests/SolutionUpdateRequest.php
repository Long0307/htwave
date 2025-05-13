<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolutionUpdateRequest extends FormRequest
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
            'Background1' => ['image', 'max:1024'],
            'Slogan' => ['required', 'max:255', 'string'],
            'Background2' => ['image', 'max:1024'],
            'background3' => ['image', 'max:1024'],
            'Title' => ['required', 'max:255', 'string'],
            'Description' => ['required', 'max:255', 'string'],
            'Solution1' => ['nullable','max:10000'],
            'Solution2' => ['nullable','max:10000'],
            'Solution3' => ['nullable','max:10000'],
            'Solution4' => ['nullable','max:10000'],
            'Solution5' => ['nullable','max:10000'],
            'Solution6' => ['nullable','max:10000'],
            'Solution7' => ['nullable','max:10000'],
            'Solution8' => ['nullable','max:10000'],
            'Solution9' => ['nullable','max:10000'],
            'Solution10' => ['nullable','max:10000'],
            'Solution11' => ['nullable','max:10000'],
            'Solution12' => ['nullable','max:10000'],
            'Solution13' => ['nullable','max:10000'],
            'Solution14' => ['nullable','max:10000'],
            'Solution15' => ['nullable','max:10000'],
            'Solution16' => ['nullable','max:10000'],
            'Solution17' => ['nullable','max:10000'],
            'Solution18' => ['nullable','max:10000'],
            'Solution19' => ['nullable','max:10000'],
            'Solution20' => ['nullable','max:10000'],
        ];
    }
}
