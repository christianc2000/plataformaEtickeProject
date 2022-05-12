<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'image'=>'required|image|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'title'=>'Debe rellenar el campo título',
            'description'=>'Debe describir el evento',
            'category_id'=>'Debe seleccionar una categoria',
            'image'=>'Debe rellenar el campo Imagen|Debe escoger una imagen',
        ];
    }
}
