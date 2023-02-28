<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\curso;
use App\helpers\Tipos;
use App\Models\reporte;
use Illuminate\Http\Request;
use App\Models\mensual_asesoria;
use App\Http\Requests\ReporteRequest;
use Illuminate\Support\Facades\Storage;

class AsesoriasController extends Controller
{
    public function index(){
        $data['data'] = curso::with('tutor')->where('tipo',Tipos::ASESORIA)->get();
        $data['title'] = "Asesorias";
        return view('asesorias.index',$data);
    }


    public function detalle($id){
        $data['data'] = curso::with('tutor','grupo')->where('id',$id)->first();
        $data['reportes'] = reporte::with('user')->where('curso_id',$id)->get();
        $data['mensual'] = mensual_asesoria::with('user')->whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->where('asesoria_id',$id)->get();
        $data['title'] = "Detalle Asesoria";
        return view('asesorias.detalle',$data);
    }

    public function storeMensual(ReporteRequest $request){

        $filename = time().".".$request->file->getClientOriginalExtension();
            Storage::disk('public_uploads_reportes')->put($filename, file_get_contents($request->file));

            $reporte = new mensual_asesoria();
            $reporte->descripcion = strtoupper($request->observaciones);
            $reporte->month = \Carbon\Carbon::now()->formatLocalized('%B');
            $reporte->asesoria_id = $request->id;
            $reporte->file = $filename;
            return $reporte->save();
    }



    public function storeReporte(ReporteRequest $request){

        $filename = time().".".$request->file->getClientOriginalExtension();
            Storage::disk('public_uploads_reportes')->put($filename, file_get_contents($request->file));

            $reporte = new reporte();
            $reporte->descripcion = strtoupper($request->observaciones);
            $reporte->curso_id = $request->id;
            $reporte->file = $filename;
            return $reporte->save();
    }
}
