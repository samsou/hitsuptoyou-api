<?php

namespace App\Http\Requests\Ask;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:50',
            'desc' => 'required',
            'address' => 'nullable|string|max:50',
            'weblink' => 'nullable|url',
            'phone' => 'nullable|string|max:50',
            'price' => 'required|numeric',
        ];
    }
}
