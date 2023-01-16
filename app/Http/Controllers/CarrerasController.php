<?php

namespace App\Http\Controllers;

use App\Models\carrera;
use Illuminate\Http\Request;
use App\Http\Requests\CarrerasRequest;

class CarrerasController extends Controller
{
    public function registro(){
        $data['title'] = "Registro de Carreras";
        return view('carreras.registro',$data);
    }

    public function store(CarrerasRequest $request){
        $carrera = new carrera([
            'nombre' => strtoupper($request->nombre),
            'descripcion' => strtoupper($request->descripcion),
        ]);
         return $carrera->save();
    }
}
