<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarrerasRequest extends FormRequest
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
            'nombre' => 'required|unique:carreras,nombre',
            'descripcion' => 'required',
            ];
    }
    public function messages()
    {
        return [


            'nombre.required' => 'EL CAMPO "NOMBRE" ES REQUERIDO',
            'nombre.unique' => 'EL CAMPO "NOMBRE" YA HA SIDO REGISTRADO',
            'descripcion.required' => 'EL CAMPO "DESCRIPCIÓN" ES REQUERIDO',
        ];
    }
}
