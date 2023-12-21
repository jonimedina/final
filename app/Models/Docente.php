<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materia;

class Docente extends Model
{
    use HasFactory;
    
    protected $table = 'docentes';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'telefono',
        'email',
        'rol',
        'materia',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($docente) {
            $user = $docente->user;
            if ($user) {
                $user->update(['rol' => $docente->rol]);
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'email', 'email');
    }

    public function materias(){
        return $this->hasMany(Materia::class);
    }


}
