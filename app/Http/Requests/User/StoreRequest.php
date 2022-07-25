<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required|string|max:50',
            'surname' => 'nullable|string|max:50',
            'email' => ['required', 'max:50', 'email', Rule::unique('users')],
            'phone' => 'nullable|string|max:50',
            'birthday' => 'nullable|date:Y-m-d',
            'occupation' => 'nullable|string|max:50',
            'salary' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:50',
            'street' => 'nullable|string|max:50',
            'zip_code' => 'nullable|string|max:50',
            'country' => 'nullable|string|max:50',
            'civility' => 'nullable|string|max:50',
            'company_name' => 'nullable|string|max:50',
            'company_number' => 'nullable|string|max:50',
            'website' => 'nullable|url',
            'is_pro_user' => 'boolean',
            'is_admin' => 'boolean',
            'is_super_admin' => 'boolean',
            'official_registration_document_path' => 'nullable|string',
        ];
    }
}
