<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursosRequest extends FormRequest
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
            'nombre' => 'required|unique:cursos,nombre',
            'descripcion' => 'required',
            'maestro' => 'required',
            'grupo' => 'required',
            'limite' => 'required|date|date_format:Y-m-d|after:today',
            ];
    }
    public function messages()
    {
        return [


            'nombre.required' => 'EL CAMPO "NOMBRE" ES REQUERIDO',
            'nombre.unique' => 'EL CAMPO "NOMBRE" YA HA SIDO REGISTRADO',
            'descripcion.required' => 'EL CAMPO "DESCRIPCIÓN" ES REQUERIDO',
            'maestro.required' => 'EL CAMPO "PROFESOR" ES REQUERIDO',
            'grupo.required' => 'EL CAMPO "GRUPO" ES REQUERIDO',
            'limite.required' => 'EL CAMPO "FECHA LIMITE" ES REQUERIDO',
            'limite.date' => 'EL CAMPO "FECHA LIMITE" NO ES VALIDO',
            'limite.after' => 'EL LÍMITE DEBE SER UNA FECHA POSTERIOR A HOY',
        ];
    }
}
