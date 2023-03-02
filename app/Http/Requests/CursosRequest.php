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
            'nombre' => 'required',
            'tutor' => 'required',
            'grupo' => 'required',
            'inicio' => 'required|date|date_format:Y-m-d',
            'fin' => 'required|date|date_format:Y-m-d',
            'tipo' => 'required',
            ];
    }
    public function messages()
    {
        return [


            'nombre.required' => 'EL CAMPO "NOMBRE" ES REQUERIDO',
            'nombre.unique' => 'EL CAMPO "NOMBRE" YA HA SIDO REGISTRADO',
            'descripcion.required' => 'EL CAMPO "DESCRIPCIÓN" ES REQUERIDO',
            'tutor.required' => 'EL CAMPO "TUTOR" ES REQUERIDO',
            'grupo.required' => 'EL CAMPO "GRUPO" ES REQUERIDO',
            'inicio.required' => 'EL CAMPO "INICIO" ES REQUERIDO',
            'inicio.date' => 'EL CAMPO "INICIO" NO ES VALIDO',
            'fin.required' => 'EL CAMPO "FIN" ES REQUERIDO',
            'fin.date' => 'EL CAMPO "FIN" NO ES VALIDO',
            'inicio.after' => 'EL LÍMITE DEBE SER UNA FECHA POSTERIOR A HOY',
            'tipo.required' => 'EL CAMPO "TIPO" ES REQUERIDO',
        ];
    }
}
