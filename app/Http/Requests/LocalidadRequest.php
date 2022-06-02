<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalidadRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'gps' => 'required',
            'name' => 'required',
            'direction' => 'required',
            "phones1" => 'required|integer|min:1000000',
            "phones2" => 'nullable|integer|min:1000000',
          /*  "phones" => "required|array|min:1",// para verificar que es un array con por lo menos un elemento
            "phones.*" => "nullable|integer|distinct",//se verifica cada elemento del array */
            'capacidad' => 'required',
            'sectors'=>'required|array|min:1',
            'sectors.*'=>'required|string|distinct',
            'colors'=>'required|array|min:1',
            'colors.*'=>'required|string',
            'capacidads'=>'required|array|min:1',
            'capacidads.*'=>'required|integer|min:0'
        ];
    }
    public function messages()
    {
        return [
            'phones1.min'=>"la cantidad de digitos del campo teléfono 1 deben ser 7 o mayor a 7",
            'phones2.size'=>"la cantidad de digitos del campo teléfono 2 deben ser 7 o mayor a 7"
        ];
    }
   
}
