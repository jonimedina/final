<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::orderBy('id','ASC')->paginate(10);
        return view("/vistas.estudiantes")->with('estudiantes', $estudiantes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $estudiante = new Estudiante;

        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->dni = $request->dni;
        $estudiante->mail = $request->mail;
        $estudiante->escuela = $request->escuela;
        $estudiante->materia1 = $request->materia1;
        $estudiante->materia2 = $request->materia2;
        $estudiante->retiro = $request->retiro;

        $estudiante->save();

        if ($estudiante == true){
            return back()->with("correcto", "Estudiante agregado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function buscar(Request $request)
    {
        $apellido = $request->apellido; 
        $estudiantes = Estudiante::where('apellido', 'like', '%' . $apellido . '%')->get();
        return view('/vistas.busquedaEstudiante', ['estudiantes' => $estudiantes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $estudiante = Estudiante::find($id);

        if ($estudiante){
            $estudiante->nombre = $request->nombre;
            $estudiante->apellido = $request->apellido;
            $estudiante->dni = $request->dni;
            $estudiante->mail = $request->mail;
            $estudiante->escuela = $request->escuela;
            $estudiante->materia1 = $request->materia1;
            $estudiante->materia2 = $request->materia2;
            $estudiante->retiro = $request->retiro;

            $estudiante->save();
            return back()->with("correcto", "Estudiante modificado correctamente");
        } else {
            return back()->with("incorrecto", "Error al modificar datos");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiante::find($id);
        $estudiante->delete();

        if ($estudiante == true){
            return back()->with("correcto", "Se eliminó el registro correctamente");
        } else {
            return back()->with("incorrecto", "Error al eliminar el registro");
        }
    }
}
