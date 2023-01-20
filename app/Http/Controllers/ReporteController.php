<?php

namespace App\Http\Controllers;

use App\Models\reporte;
use Illuminate\Http\Request;
use App\Http\Requests\ReporteRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ReporteRequestEdit;

class ReporteController extends Controller
{
    public function store(ReporteRequest $request){

        $filename = time().".".$request->file->getClientOriginalExtension();
            Storage::disk('public_uploads_reportes')->put($filename, file_get_contents($request->file));

            $reporte = new reporte();
            $reporte->descripcion = strtoupper($request->observaciones);
            $reporte->curso_id = $request->id;
            $reporte->file = $filename;
            return $reporte->save();
    }

    public function download($file){
        $file_path = public_path('assets/files/reportes/'.$file);
        return response()->download( $file_path);
    }

    public function detalle($id){
        $data['title'] = 'Reporte Detallado';
        $data['data'] = reporte::with('user','curso')->find($id);
       return view('reportes.index',$data);
    }

    public function update(ReporteRequestEdit $request){
        $reporte = reporte::find($request->id);
        if ($request->hasFile('file')) {
            $this->validate($request, [
                'file' => 'required|mimes:png,jpg,jpeg,pdf,docx,doc|max:2048',
              ],
              [
                'file.required' => 'EL CAMPO "ARCHIVO" ES REQUERIDO',
                'file.mimes' => 'EL CAMPO "ARCHIVO" NO ES ACEPTADO',
                'file.max' => 'EL PESO MÁXIMO ES DE 2 MB',
              ]);
              $filename = time().".".$request->file->getClientOriginalExtension();
              Storage::disk('public_uploads_reportes')->put($filename, file_get_contents($request->file));
              $reporte->file = $filename;
        }
        $reporte->descripcion = strtoupper($request->observaciones);
        return $reporte->save();
    }
}
