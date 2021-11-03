<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string|bail',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required|bail|digits_between:9,20',
            'nif' => 'required|bail',
            'active' => 'required|numeric'
        ];
    }
}
