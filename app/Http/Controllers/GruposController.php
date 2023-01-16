<?php

namespace App\Http\Controllers;

use App\Models\grupo;
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
}
