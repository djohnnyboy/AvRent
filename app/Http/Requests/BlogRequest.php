<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|bail|string|unique:App\Blog',
            'body' => 'required|bail|string|unique:App\Blog',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'coordinates' => 'required|string'
        ];
    }
}
