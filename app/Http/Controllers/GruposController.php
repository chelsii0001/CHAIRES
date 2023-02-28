<?php

namespace App\Http\Controllers;

use App\Models\grupo;
use App\Models\grupo_tutor;
use App\Models\tutor;
use App\Models\carrera;
use Illuminate\Http\Request;
use App\Http\Requests\GruposRequest;

class GruposController extends Controller
{
    public function registro(){
        $data['title'] = "Registro de Grupos";
        $data['carreras'] = carrera::orderby('nombre')->get();
        return view('grupos.registro',$data);
    }

    public function store(GruposRequest $request){
        $grupo = new grupo([
            'nombre' => strtoupper($request->nombre),
            'descripcion' => $request->descripcion,
            'carrera_id'  => $request->carrera,
        ]);
         return $grupo->save();
    }

    public function asignacion(){
        $data['title'] = "Asignacion Grupo Tutor";
        $data['tutor'] = tutor::orderby('nombre')->get();
        $data['grupos'] = grupo::where('tutor_id',NULL)->orderby('nombre')->get();
        return view('grupos.asignacion',$data);
    }


    public function storeAsignacion(Request $request){

        $request->validate([
            'tutor' => 'required|numeric|exists:tutor,id',
            'grupo' => 'required|numeric|exists:grupos,id',
          ]);
          $grupo = grupo::findOrFail($request->grupo);
          if($grupo->tutor_id > 0 ){
            $errors = (['grupo' => ['0' => 'EL GRUPO YA CUENTA CON UN TUTOR ASIGNADO']]);
                    return response()->json(['errors' => $errors], 422);
          }
          $grupo->update([
              'tutor_id' => $request->tutor,
          ]);
          $pivot = new grupo_tutor([
            'grupo_id' => $request->grupo,
            'tutor_id' => $request->tutor,
            ]);
            $pivot->save();
    }
}
