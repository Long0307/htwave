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
            'Background1' => ['image', 'max:1024'],
            'Slogan' => ['required', 'max:255', 'string'],
            'Background2' => ['image', 'max:1024'],
            'background3' => ['image', 'max:1024'],
            'Title' => ['required', 'max:255', 'string'],
            'Description' => ['required', 'max:255', 'string'],
            'Solution1' => ['nullable','max:10000', 'string'],
            'Solution2' => ['nullable','max:10000', 'string'],
            'Solution3' => ['nullable','max:10000', 'string'],
            'Solution4' => ['nullable','max:10000', 'string'],
            'Solution5' => ['nullable','max:10000', 'string'],
            'Solution6' => ['nullable','max:10000', 'string'],
            'Solution7' => ['nullable','max:10000', 'string'],
            'Solution8' => ['nullable','max:10000', 'string'],
            'Solution9' => ['nullable','max:10000', 'string'],
            'Solution10' => ['nullable','max:10000', 'string'],
            'Solution11' => ['nullable','max:10000', 'string'],
            'Solution12' => ['nullable','max:10000', 'string'],
            'Solution13' => ['nullable','max:10000', 'string'],
            'Solution14' => ['nullable','max:10000', 'string'],
            'Solution15' => ['nullable','max:10000', 'string'],
            'Solution16' => ['nullable','max:10000', 'string'],
            'Solution17' => ['nullable','max:10000', 'string'],
            'Solution18' => ['nullable','max:10000', 'string'],
            'Solution19' => ['nullable','max:10000', 'string'],
            'Solution20' => ['nullable','max:10000', 'string'],
        ];
    }
}
