<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubirSubastaRequest extends FormRequest
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
            'precio_inicial'=>'required|numeric|min:10|regex:/^[\d]{1,3}(\.[\d]{1,2})?$/',
            'inicio_subasta'=>'required',
            'final_subasta'=>'required'
        ];
    }
}
