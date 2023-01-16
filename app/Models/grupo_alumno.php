<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupo_alumno extends Model
{
    protected $table = "grupos_alumnos";
    protected $fillable = ['grupo_id','alumno_id'];
    use HasFactory;
}
