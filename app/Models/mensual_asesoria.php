<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mensual_asesoria extends Model
{
    use HasFactory;
    protected $table = "mensual_asesoria";
    protected $fillable = ['asesoria_id','month','user_id','file','descripcion'];

    public static function boot()
    {
        parent::boot();
        if (!app()->runningInConsole()) {
            self::creating(function ($table) {
                $table->user_id = Auth::user()->id;
            });

        }

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
