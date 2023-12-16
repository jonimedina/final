<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    
    protected $table = 'docentes';
    public $timestamps = false;
    protected $fillable = [
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

    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}
