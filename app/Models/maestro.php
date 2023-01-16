<?php

namespace App\Models;

use App\Models\curso;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class maestro extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombre','edad','domicilio','email','user_id'];

    public function grupos()
    {
        return $this->hasMany(curso::class);
    }
}
