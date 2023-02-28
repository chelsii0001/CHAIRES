<?php

namespace App\Http\Controllers;

use Avatar;
use App\Models\jefe;
use App\Models\User;
use App\helpers\Tipos;
use App\Models\carrera;
use Illuminate\Http\Request;
use App\Http\Requests\JefeRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class JefeController extends Controller
{
    public function registro(){
        $data['title'] = 'Registro de Jefe de Carrera';
        $data['carreras'] = carrera::get();
        return view('jefe.registro',$data);
    }

    public function store(JefeRequest $request){
        $filename = $request->user.'.png';

        $user = new User([
            'name' => strtoupper($request->nombre),
            'user' => $request->user,
            'img'  => $filename,
            'tipo' => Tipos::JEFE,
            'password' => Hash::make($request->password),
        ]);
         $user->save();

        $jefe = new jefe([
            'nombre' => strtoupper($request->nombre),
            'descripcion' => $request->descripcion,
            'user_id' => $user->id,
            'carrera_id' => $request->carrera,
        ]);
       $jefe->save();

        $avatar = Avatar::create($request->nombre)
        ->setDimension(600, 600)
        ->setFontSize(120)
        ->getImageObject()->encode('png');
        return Storage::disk('public_uploads_users')->put($filename, $avatar);



    }

}
