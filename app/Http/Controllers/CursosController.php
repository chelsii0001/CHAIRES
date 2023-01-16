<?php

namespace App\Http\Controllers;

use Avatar;
use Carbon\Carbon;
use App\Models\curso;
use App\Models\grupo;
use App\Models\maestro;
use App\Models\reporte;
use Illuminate\Http\Request;
use App\Http\Requests\CursosRequest;
use Illuminate\Support\Facades\Storage;

class CursosController extends Controller
{

    private $maximo;


    public function __construct() {
        $this->maximo = 4;
    }
    public function registro(Request $request){
        //$data['data'] = grupo::with('alumnos')->get();
        $data['title'] = "Registro de Tutorias";
        $data['maestros'] = maestro::get();
        $data['grupos'] = grupo::get();
        return view('cursos.registro',$data);
    }

    public function store(CursosRequest $request){
        $filename = time().'T'.'.png';
        $curso = new curso([
            'nombre' => strtoupper($request->nombre),
            'descripcion' => strtoupper($request->descripcion),
            'limite' => $request->limite,
            'maestro_id' => $request->maestro,
            'img' => $filename,
            'grupo_id' => $request->grupo,
        ]);
        $curso->save();

        $avatar = Avatar::create($curso->nombre)
        ->setDimension(600, 600)
        ->setFontSize(120)
        ->getImageObject()->encode('png');
        Storage::disk('public_uploads')->put($filename, $avatar);

    }

    public function index(){
        $data['data'] = curso::get();
        $data['title'] = "Tutorias";
        return view('cursos.index',$data);
    }

    public function detalle($id){
        $data['data'] = curso::with('maestro','grupo')->where('id',$id)->first();
        $data['reportes'] = reporte::with('user')->where('curso_id',$id)->get();
        $data['title'] = "Detalle Tutorias";
        $data['maximo'] = $this->maximo;
        return view('cursos.detalle',$data);
    }
}
