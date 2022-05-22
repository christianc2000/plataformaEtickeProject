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
            'image.*'   =>  'required|image|mimes:jpg,jpeg,bmp,png',
            'json' => '',
            //'image.*'=>'required|image|mimes:png,jpg'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Debe rellenar el campo título',
            'description.required'=>'Debe describir el evento',
            'category_id.required'=>'Debe seleccionar una categoria',
           /* 'image.required'=>'Error debe seleccionar una imágen',
            'image.image'=>'Error debe escoger una imagen',
            'image.max'=>'Error la(s) imágen(es) superan la calidad de 10 MB'*/
        ];
    }
}
