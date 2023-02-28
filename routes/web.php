<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JefeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\AsesoriasController;

Route::post('authlogin', [LoginController::class, 'login'])->name('authlogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function()
{

Route::get('index', [HomeController::class, 'index'])->name('index');
//TUTORIAS
Route::group(['prefix'=>'tutorias'], function(){

    Route::get('registro', [CursosController::class, 'registro'])->name('cursos.registro');
    Route::get('fechas', [CursosController::class, 'fechas'])->name('tutorias.fechas');
    Route::post('store', [CursosController::class, 'store'])->name('cursos.store');
    Route::get('index', [CursosController::class, 'index'])->name('cursos.index');
    Route::get('/detalle/{id}', [CursosController::class, 'detalle'])->name('cursos.detalle');

    Route::group(['prefix'=>'reportes'], function(){

        Route::post('store', [ReporteController::class, 'store'])->name('reportes.store');
        Route::get('/download/{file}',[ReporteController::class, 'download'])->name('reportes.download');
        Route::get('/detalle/{id}', [ReporteController::class, 'detalle'])->name('reporte.detalle');
        Route::post('update', [ReporteController::class, 'update'])->name('reporte.update');
    });

});


//ASESORIAS
Route::group(['prefix'=>'asesorias'], function(){

    Route::get('registro', [AsesoriasController::class, 'registro'])->name('asesorias.registro');
    Route::post('store', [AsesoriasController::class, 'store'])->name('asesorias.store');
    Route::get('index', [AsesoriasController::class, 'index'])->name('asesorias.index');
    Route::get('/detalle/{id}', [AsesoriasController::class, 'detalle'])->name('asesorias.detalle');

    Route::group(['prefix'=>'reportes'], function(){
        Route::post('storeMensual', [AsesoriasController::class, 'storeMensual'])->name('asesoria.mensual.reportes.store');
        Route::post('storeReporte', [AsesoriasController::class, 'storeReporte'])->name('asesoria.reportes.store');

    });

});

Route::group(['prefix'=>'registros'], function(){
    Route::group(['prefix'=>'tutor'], function(){
    Route::get('registro', [TutorController::class, 'registro'])->name('tutor.registro');
    Route::post('store', [TutorController::class, 'store'])->name('tutor.store');

    });

    Route::group(['prefix'=>'alumno'], function(){
        Route::get('registro', [AlumnosController::class, 'registro'])->name('alumnos.registro');
        Route::post('store', [AlumnosController::class, 'store'])->name('alumnos.store');

    });


    Route::group(['prefix'=>'grupo'], function(){
        Route::get('registro', [GruposController::class, 'registro'])->name('grupo.registro');
        Route::get('asignacion', [GruposController::class, 'asignacion'])->name('grupo.asignacion');
        Route::post('store', [GruposController::class, 'store'])->name('grupo.store');
        Route::post('store/asignacion', [GruposController::class, 'storeAsignacion'])->name('grupo.store.asignacion');

    });

    Route::group(['prefix'=>'carrera'], function(){
        Route::get('registro', [CarrerasController::class, 'registro'])->name('carrera.registro');
        Route::post('store', [CarrerasController::class, 'store'])->name('carrera.store');

    });


    Route::group(['prefix'=>'jefe'], function(){
        Route::get('registro', [JefeController::class, 'registro'])->name('jefe.registro');
        Route::post('store', [JefeController::class, 'store'])->name('jefe.store');

    });

    });


});

Route::get('/', function () {
    return view('login.index');
})->name('/')->middleware('guest');



