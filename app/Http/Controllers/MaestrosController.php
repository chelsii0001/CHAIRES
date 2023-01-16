<?php

namespace App\Http\Controllers;

use Avatar;
use App\Models\User;
use App\Models\maestro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\MaestrosRequest;
use Illuminate\Support\Facades\Storage;
use Tipos;

class MaestrosController extends Controller
{
    public function registro(){
        $data['title'] = "Registro de Maestros";
        return view('maestros.registro',$data);
    }

    public function store(MaestrosRequest $request){
        $filename = time().$request->user.'.png';

        $user = new User([
            'name' => strtoupper($request->nombre),
            'user' => $request->user,
            'img'  => $filename,
            'tipo' => Tipos::MAESTRO,
            'password' => Hash::make("1234"),
        ]);
         $user->save();

        $maestro = new maestro([
            'nombre' => strtoupper($request->nombre),
            'email' => $request->email,
            'edad' => $request->edad,
            'user_id' => $user->id,
            'domicilio' => strtoupper($request->domicilio),
        ]);
       $maestro->save();

     $avatar = Avatar::create($request->nombre)
     ->setDimension(600, 600)
     ->setFontSize(120)
     ->getImageObject()->encode('png');
     return Storage::disk('public_uploads_users')->put($filename, $avatar);




    }
}
