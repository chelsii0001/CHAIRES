<?php

namespace App\Http\Controllers;

use Tipos;
use Avatar;
use App\Models\User;
use App\Models\grupo;
use App\Models\alumno;
use App\Models\grupo_alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AlumnosRequest;
use Illuminate\Support\Facades\Storage;

class AlumnosController extends Controller
{
    public function registro(){
        $data['title'] = "Registro de Alumnos";
        $data['grupos'] = grupo::orderby('nombre')->get();
        return view('alumnos.registro',$data);
    }

    public function store(AlumnosRequest $request){
        $filename = $request->user.'.png';

        $user = new User([
            'name' => strtoupper($request->nombre),
            'user' => $request->user,
            'img'  => $filename,
            'tipo' => Tipos::ALUMNO,
            'password' => Hash::make("1234"),
        ]);
         $user->save();

        $alumno = new alumno([
            'nombre' => strtoupper($request->nombre),
            'matricula' => $request->matricula,
            'email' => $request->email,
            'edad' => $request->edad,
            'user_id' => $user->id,
            'domicilio' => strtoupper($request->domicilio),
        ]);
       $alumno->save();


        $pivot = new grupo_alumno([
            'grupo_id' => $request->grupo,
            'alumno_id' => $alumno->id,
        ]);
        $pivot->save();

        $avatar = Avatar::create($request->nombre)
        ->setDimension(600, 600)
        ->setFontSize(120)
        ->getImageObject()->encode('png');
        return Storage::disk('public_uploads_users')->put($filename, $avatar);




    }
}
