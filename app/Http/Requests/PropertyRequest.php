<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'county' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'town' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'nullable|string',
            'num_bedrooms' => 'required|numeric|min:1|max:10',
            'num_bathrooms' => 'required|numeric|min:1|max:10',
            'price' => 'required|numeric|min:1',
        ];

    }
}
