<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required','min:3', 'max:50', 'string'],
            'min_price' => ['required','numeric'],
            'max_price' => ['required','numeric'],
            'weight_unit' => ['required'],
            'description' => ['required', 'string'],
            'image.*' => [ 'max:2048', 'required'],
        ];
    }
}
