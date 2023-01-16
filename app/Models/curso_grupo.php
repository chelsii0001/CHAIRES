<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso_grupo extends Model
{
    protected $table = "cursos_grupos";
    protected $fillable = ['curso_id','grupo_id'];
    use HasFactory;
}
