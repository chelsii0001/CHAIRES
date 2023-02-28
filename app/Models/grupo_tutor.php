<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupo_tutor extends Model
{
    use HasFactory;
    protected $table = "grupos_tutor";
    protected $fillable = ['grupo_id','tutor_id'];
}
