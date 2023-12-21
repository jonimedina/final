<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Docente;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'rol',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function docente(){
        return $this->hasOne(Docente::class,'email','email');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->crearDocente();
        });
    }

    public function crearDocente()
    {
        $docenteExistente = Docente::where('email', ['email'])->first();
        if (!$docenteExistente) {
        $this->docente()->create([
            'nombre' => $this->name,
            'email' => $this->email,
            'apellido'=> '',
            'telefono'=>'',
            'rol'=>'Docente',
            'materia'=>'',]);
        } 
        
    }
}
