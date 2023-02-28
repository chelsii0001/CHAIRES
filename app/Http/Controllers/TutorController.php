<?php

namespace App\Http\Controllers;

use Tipos;
use Avatar;
use App\Models\User;
use App\Models\tutor;
use App\Models\maestro;
use Illuminate\Http\Request;
use App\Http\Requests\TutorRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TutorController extends Controller
{
    public function registro(){
        $data['title'] = "Registro de Tutor";
        return view('tutor.registro',$data);
    }


    public function store(TutorRequest $request){
        $filename = time().$request->user.'.png';

        $user = new User([
            'name' => strtoupper($request->nombre),
            'user' => $request->user,
            'img'  => $filename,
            'tipo' => Tipos::TUTOR,
            'password' => Hash::make($request->password),
        ]);
         $user->save();

        $tutor = new tutor([
            'nombre' => strtoupper($request->nombre),
            'email' => $request->email,
            'edad' => $request->edad,
            'user_id' => $user->id,
            'domicilio' => strtoupper($request->domicilio),
        ]);
       $tutor->save();

     $avatar = Avatar::create($request->nombre)
     ->setDimension(600, 600)
     ->setFontSize(120)
     ->getImageObject()->encode('png');
     return Storage::disk('public_uploads_users')->put($filename, $avatar);




    }
}
