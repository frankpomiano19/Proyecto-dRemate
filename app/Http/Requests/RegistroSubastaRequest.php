<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroSubastaRequest extends FormRequest
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
            'nombre_producto'=>['required','min:8'],
            'descripcion'=>['required','min:25'],
            'categoria_id'=>'required',
            'estado'=>'required',
            'condicion'=>'required',
            'selectDepartamento'=>'required',
            'selectProvincia'=>'required',
            'image_name1'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
            'image_name2'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
            'image_name3'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
            'image_name4'=>'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
            'garantia'=>['required','min:8'],
            'precio_inicial'=>'required|numeric|regex:/^[\d]{0,3}(\.[\d]{1,2})?$/',
            'inicio_subasta'=>'required',
            'final_subasta'=>'required'
        ];
    }
}
