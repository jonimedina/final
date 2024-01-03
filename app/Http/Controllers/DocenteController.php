<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Materia;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class DocenteController extends Controller
{
    /**
     *Muestra el listado completo de docentes
     */
    public function index()
    {
        $docentes = Docente::orderBy('id','ASC')->paginate(10);
        $materias = Materia::all();
        $usuarios = User::all();
        return view("/vistas.docentes")->with('docentes', $docentes)->with('usuarios', $usuarios)->with('materias', $materias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $usuarioExistente = User::where('email', $request['email'])->first();

        // Si el usuario no existe, lo crea y luego crea el docente
        if (!$usuarioExistente) {
            $usuario = new User;
            $usuario->name = $request->nombreD;
            $usuario->email = $request->mailD;
            $usuario->rol = $request->rolD;
            $usuario->password = 'docente123';
            $usuario->save();
            
            $rol = $request->rolD; 
            $usuario->assignRole($rol);
            
            $docente = Docente::where('email', $usuario['email'])->first();
            $docente->apellido = $request->apellidoD;
            $docente->telefono = $request->telefonoD;
            $docente->rol = $request->rolD;
            $docente->materia = $request->materiaD;
            $docente->save();
        } else {
        //Si el usuario existe, crea el docente
            $docente = new Docente;
            $docente->nombre = $request->nombreD;
            $docente->apellido = $request->apellidoD;
            $docente->telefono = $request->telefonoD;
            $docente->email = $request->mailD;
            $docente->rol = $request->rolD;
            $docente->materia = $request->materiaD;
    
            $docente->save();
            }


        if ($docente == true){
            return back()->with("correcto", "Docente agregado correctamente");
        } else {
            return back()->with("incorrecto", "Error al registrar");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for looking the specified resource.
     */
    public function buscar(Request $request)
    {
        $materias = Materia::all();
        $apellido = $request->apellido; 
        $docentes = Docente::where('apellido', 'like', '%' . $apellido . '%')->get();    
        return view('/vistas.busquedaDocente', ['docentes' => $docentes])->with('materias' , $materias);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $docente = Docente::find($id);

        if ($docente){
            $docente->nombre = $request->nombreD;
            $docente->apellido = $request->apellidoD;
            $docente->telefono = $request->telefonoD;
            $docente->rol = $request->rolD;
            $docente->materia = $request->materiaD;

            $docente->save();

            $usuario = User::where('email', $docente->email)->first();
            $rol = $request->rolD; 
            $usuario->assignRole($rol);

            return back()->with("correcto", "Docente modificado correctamente");
        } else {
            return back()->with("incorrecto", "Error al modificar docente");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $docente = Docente::find($id);
        $docente->delete();

        $usuarioExistente = User::where('email', $docente['email'])->first();        
        $usuarioExistente->delete();

        if ($docente == true){
            return back()->with("correcto", "Se eliminó el docente y usuario correctamente");
        } else {
            return back()->with("incorrecto", "Error al eliminar el registro");
        }
    }
}
