<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jefe extends Model
{
    use HasFactory;
    protected $table = "jefe";
    protected $fillable = ['id','nombre','descripcion','user_id','carrera_id'];
}
