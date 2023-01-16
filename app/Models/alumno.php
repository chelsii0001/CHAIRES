<?php

namespace App\Models;

use App\Models\curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class alumno extends Model
{
    protected $fillable = ['id','nombre','edad','domicilio','email','user_id','matricula'];
    use HasFactory;

    public function grupos()
    {
        return $this->belongsToMany(grupo::class, 'grupos_alumnos');
    }
}
