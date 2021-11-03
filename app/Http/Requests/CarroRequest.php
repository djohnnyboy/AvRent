<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarroRequest extends FormRequest
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
            'groupType' => 'required|bail|string|max:37',
            'marca' => 'required|bail|string|max:37',
            'epocaBaixa' => 'required|bail|numeric',
            'epocaMedia' => 'required|bail|numeric',
            'epocaMediaAlta' => 'required|bail|numeric',
            'epocaAlta' => 'required|bail|numeric',
            'seguro' => 'required|bail|numeric',
            'transmissao' => 'required|bail|string|max:14',
            'combustivel' => 'required|bail|string|max:9',
            'lugares' => 'required|bail|numeric|max:9',
            'bagagemGr' => 'required|bail|numeric|max:9',
            'bagagemPq' => 'required|bail|numeric|max:9',
            'arCondicionado' => 'required|bail|string|max:14',
            'imagem' => 'image|mimes:jpeg,png,jpg,gif,svg|max:120',
        ];
    }
}
