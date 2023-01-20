<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\CarrerasController;
use App\Http\Controllers\MaestrosController;

Route::post('authlogin', [LoginController::class, 'login'])->name('authlogin');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => 'auth'], function()
{

Route::get('index', [HomeController::class, 'index'])->name('index');

Route::group(['prefix'=>'tutorias'], function(){

    Route::get('registro', [CursosController::class, 'registro'])->name('cursos.registro');
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

Route::group(['prefix'=>'registros'], function(){
    Route::group(['prefix'=>'maestro'], function(){
    Route::get('registro', [MaestrosController::class, 'registro'])->name('maestros.registro');
    Route::post('store', [MaestrosController::class, 'store'])->name('maestros.store');

    });

    Route::group(['prefix'=>'alumno'], function(){
        Route::get('registro', [AlumnosController::class, 'registro'])->name('alumnos.registro');
        Route::post('store', [AlumnosController::class, 'store'])->name('alumnos.store');

    });


    Route::group(['prefix'=>'grupo'], function(){
        Route::get('registro', [GruposController::class, 'registro'])->name('grupo.registro');
        Route::post('store', [GruposController::class, 'store'])->name('grupo.store');

    });

    Route::group(['prefix'=>'carrera'], function(){
        Route::get('registro', [CarrerasController::class, 'registro'])->name('carrera.registro');
        Route::post('store', [CarrerasController::class, 'store'])->name('carrera.store');

    });

    });


});

Route::get('/', function () {
    return view('login.index');
})->name('/')->middleware('guest');



