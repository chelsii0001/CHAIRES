<?php

namespace App\Models;

use App\Models\curso;
use App\Models\alumno;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class grupo extends Model
{
    protected $fillable = ['id','nombre','descripcion','carrera_id'];
    use HasFactory;

    public function alumnos()
    {
        return $this->belongsToMany(alumno::class, 'grupos_alumnos');
    }


    public function cursos()
    {
        return $this->hasMany(curso::class);
    }
}
