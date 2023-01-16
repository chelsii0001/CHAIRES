<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaestrosRequest extends FormRequest
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
            'nombre' => 'required|unique:maestros,nombre',
            'email' => 'required|email',
            'domicilio' => 'required',
            'user' => 'required|unique:users,user',
            'edad' => 'required|numeric|digits:2',
            ];
    }

    public function messages()
    {
        return [


            'nombre.required' => 'EL CAMPO "NOMBRE" ES REQUERIDO',
            'nombre.unique' => 'EL CAMPO "NOMBRE" YA HA SIDO REGISTRADO',
            'email.required' => 'EL CAMPO "EMAIL" ES REQUERIDO',
            'email.email' => 'EL CAMPO "EMAIL" NO ES VÁLIDO',
            'edad.required' => 'EL CAMPO "EDAD" ES REQUERIDO',
            'edad.numeric' => 'EL CAMPO "EDAD" NO ES VÁLIDO',
            'edad.digits' => 'EL CAMPO "EDAD" NO ES VÁLIDO',
            'domicilio.required' => 'EL CAMPO "DOMICILIO" ES REQUERIDO',
            'user.required' => 'EL CAMPO "USUARIO" ES REQUERIDO',
            'user.unique' => 'EL CAMPO "USUARIO" YA HA SIDO REGISTRADO',

        ];
    }

}
