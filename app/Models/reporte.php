<?php

namespace App\Models;

use App\Models\User;
use App\Models\curso;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class reporte extends Model
{
    protected $fillable = ['user_id','descripcion','curso_id','file'];
    use HasFactory;
    public static function boot()
    {
        parent::boot();
        if (!app()->runningInConsole()) {
            self::creating(function ($table) {
                $table->user_id = Auth::user()->id;
            });

        }

    }

    public function curso()
    {
        return $this->belongsTo(curso::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
