<?php

namespace App\Http\Controllers;

use App\Models\reporte;
use Illuminate\Http\Request;
use App\Http\Requests\ReporteRequest;
use Illuminate\Support\Facades\Storage;

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
}
