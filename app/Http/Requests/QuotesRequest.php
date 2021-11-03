<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuotesRequest extends FormRequest
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
            'pickUpDate' => 'bail|date',
            'pickUpPlace' => 'bail|numeric',
            'dropOffDate' => 'bail|date',
            'dropOffPlace' => 'bail|numeric',
            'carros' => 'bail|string',
            'age' => 'bail|required|numeric|min:23|max:90',
        ];
    }
}
