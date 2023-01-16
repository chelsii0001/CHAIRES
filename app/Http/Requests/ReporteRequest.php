<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReporteRequest extends FormRequest
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
            'id' => 'required',
            'observaciones' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
            ];
    }
    public function messages()
    {
        return [


            'id.required' => 'OCURRIO UN ERROR',
            'file.required' => 'EL CAMPO "ARCHIVO" ES REQUERIDO',
            'file.mimes' => 'EL CAMPO "ARCHIVO" NO ES ACEPTADO',
            'file.max' => 'EL PESO MÁXIMO ES DE 2 MB',
            'observaciones.required' => 'EL CAMPO "OBSERVACIONES" ES REQUERIDO',
        ];
    }
}
