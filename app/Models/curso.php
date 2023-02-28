<?php

namespace App\Models;

use App\Models\grupo;
use App\Models\maestro;
use App\Models\reporte;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class curso extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','nombre','descripcion','tutor_id','status','inicio','fin','grupo_id','img','tipo'];


    public static function boot()
    {
        parent::boot();
        if (!app()->runningInConsole()) {
            self::creating(function ($table) {
                $table->user_id = Auth::user()->id;
                $table->status = 1;
            });

        }

    }

    public function tutor()
    {
        return $this->belongsTo(tutor::class);
    }

    public function grupo()
    {
        return $this->belongsTo(grupo::class);
    }

    public function reportes()
    {
        return $this->hasMany(reporte::class);
    }



}
