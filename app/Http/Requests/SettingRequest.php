<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'email' => 'required|bail|string|email|max:255',
            'spainInsurance' => 'required|numeric|bail',
            'gps' => 'required|numeric|bail',
            'extraDriver' => 'required|numeric|bail',
            'todlerSeat' => 'required|numeric|bail',
            'infantSeat' => 'required|numeric|bail',
            'boosterSeat' => 'required|numeric|bail', 
        ];
    }
}