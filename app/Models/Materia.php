<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Docente;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'nombre',
        'anio',
    ];

    public function docente(){
        return $this->belongsTo(Docente::class);
    }
}
