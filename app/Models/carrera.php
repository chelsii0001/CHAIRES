<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carrera extends Model
{
    protected $table = "carreras";
    protected $fillable = ['id','nombre','descripcion'];
    use HasFactory;
}
