<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubirProductoRequest extends FormRequest
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
            'nombre'=>'required','descripcion'=>'required','categoria'=>'required','estado'=>'required','condicion'=>'required','imagen'=>'required',
            'garantia'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es requirido',
            'categoria.required' => 'El campo categoria es requirido',
            'condicion.required' => 'El campo condicion es requirido','garantia.required' => 'El campo garantia  es requirido'
        ];
    }
}
