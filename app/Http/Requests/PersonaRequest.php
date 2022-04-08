<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRequest extends FormRequest
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
            'ci'=>'required|unique:personas,ci|max:10',
            'name'=>'required|max:30',
            'lastname'=>'required|max:30',
            'sex'=>'required',
            'country'=>'required',
            'fecha_nac'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'ci.required'=>'Debe rellenar el campo CI',
            'ci.unique'=>'Carnet ya utilizado',
            'ci.max'=>'máximo 10 dígitos',
            'name.required'=>'Debe rellenar el campo Nombre',
            'name.max'=>'máximo 30 dígitos',
            'lastname.required'=>'Debe rellenar el campo Apellido',
            'lastname.max'=>'máximo 30 dígitos',
            'country.required'=>'Debe rellenar el campo Fecha de Nacimiento',
            'sex.required'=>'Debe rellenar el campo Sexo',
            
            'fecha_nac.required'=>'colocar Fecha de Nacimiento',
        ];
    }
}
