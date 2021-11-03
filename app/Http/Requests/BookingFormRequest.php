<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingFormRequest extends FormRequest
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
            'name' => 'required|string|max:255|bail',
            'email' => 'required|email|max:255|bail',
            'phone' => 'required|digits_between:9,20|bail',
            'dateOfBirth' => 'required|date|bail',
            'drivinglicence' => 'required|bail|string|max:255',
            'carros' => 'exists:App\Carro,id|numeric',
            'pickUpPlace' => 'required|bail|string',
            'pickUpDate' => 'required|bail|date|after:today',
            'pickUpTime' => 'required|bail|date_format:H:i',
            'dropOffPlace' => 'required|bail|string',
            'dropOffDate' => 'required|bail|date|after:tomorrow',
            'dropOffTime' => 'required|bail|date_format:H:i',
            'flightInformation' => 'string|bail|max:255',
            'fullInsurance' => 'bail|string|nullable',
            'spainInsurance' => 'numeric|bail|nullable',
            'gps' => 'numeric|bail|nullable',
            'extraDriver' => 'numeric|bail|nullable',
            'todlerSeat' => 'numeric|bail|nullable',
            'infantSeat' => 'numeric|bail|nullable',
            'boosterSeat' => 'numeric|bail|nullable',
            'textArea' => 'string|bail|nullable|max:255',
            'termsAndConditions' => 'accepted|string|required',
            'hiddenPrice' => 'numeric|required',
        ];
    }
}
