<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function mostrarPerfil(){

        $usuario = auth()->user();
        $docente = $usuario->docente;
        
    return view('/vistas.perfil', compact('usuario', 'docente'));
    }
}
