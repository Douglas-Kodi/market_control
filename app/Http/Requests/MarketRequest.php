<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MarketRequest extends FormRequest
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
            'name'=>'required',
            'quant'=>'required|numeric',
            'price'=>'required|numeric',
            'percentage'=>'required|numeric'
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Coloque o nome do produto!',
            'quant.required'=>'Coloque o quantidade do produto!',
            'quant.numeric'=>'Coloque em numeros a quantidade do produto!',
            'price.required'=>'Coloque o preço do produto!',
            'price.numeric'=>'Coloque em numeros o preço do produto!',
            'percentage.required'=>'Coloque a porcentagem do produto!',
            'percentage.numeric'=>'Coloque em numeros a porcentagem do produto!'
        ];
    }
}
