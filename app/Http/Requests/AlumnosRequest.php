<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlumnosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'nombre' => 'required|unique:alumnos,nombre',
            'email' => 'required|email',
            'matricula' => 'required|numeric||unique:alumnos,matricula',
            'domicilio' => 'required',
            'grupo' => 'required',
            'user' => 'required|unique:users,user',
            'edad' => 'required|numeric|digits:2',
            ];
    }

    public function messages()
    {
        return [


            'nombre.required' => 'EL CAMPO "NOMBRE" ES REQUERIDO',
            'nombre.unique' => 'EL CAMPO "NOMBRE" YA HA SIDO REGISTRADO',
            'matricula.required' => 'EL CAMPO "MATRICULA" ES REQUERIDO',
            'matricula.unique' => 'EL CAMPO "MATRICULA" YA HA SIDO REGISTRADO',
            'matricula.digits' => 'EL CAMPO "MATRICULA" NO ES VÁLIDO',
            'email.required' => 'EL CAMPO "EMAIL" ES REQUERIDO',
            'email.email' => 'EL CAMPO "EMAIL" NO ES VÁLIDO',
            'edad.required' => 'EL CAMPO "EDAD" ES REQUERIDO',
            'edad.numeric' => 'EL CAMPO "EDAD" NO ES VÁLIDO',
            'edad.digits' => 'EL CAMPO "EDAD" NO ES VÁLIDO',
            'domicilio.required' => 'EL CAMPO "DOMICILIO" ES REQUERIDO',
            'user.required' => 'EL CAMPO "USUARIO" ES REQUERIDO',
            'user.unique' => 'EL CAMPO "USUARIO" YA HA SIDO REGISTRADO',
            'grupo.required' => 'EL CAMPO "GRUPO" ES REQUERIDO',

        ];
    }
}
