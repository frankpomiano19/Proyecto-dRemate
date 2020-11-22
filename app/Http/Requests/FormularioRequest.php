<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioRequest extends FormRequest
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
            'ubicacion'=>'required',
            'distrito'=>'required',
            'imagen'=>'required',
            'garantia'=>['required','min:8']
        ];
    }
}
