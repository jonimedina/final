<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{

    public function create(Request $request)
    {
        $materia = new Materia;
        $materia->nombre = $request->nombreMateria;
        $materia->anio = $request->anioMateria;

        $materia->save();

        if ($materia == true){
            return back()->with("correcto", "Materia agregada correctamente");
        } else {
            return back()->with("incorrecto", "Error al agregar materia");
        }
    }

}
