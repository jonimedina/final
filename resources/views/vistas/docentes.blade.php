@extends('layouts.app')
@section('content')

<div class="container mt-4">
    
    @if (session("correcto"))
        <div class="alert alert-success">{{session("correcto")}}</div>
    @endif

    @if (session("incorrecto"))
        <div class="alert alert-danger">{{session("incorrecto")}}</div>
    @endif

    
    <table class="table table-striped table-hover">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end" >
            @can('docentes.create')
            <button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#modalAgregarDocente">Agregar docente</button>
            @endcan
            @can('materia.create')
            <button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#modalAgregarMateria">Agregar materia</button>
            @endcan
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-2" >
            <a href="{{route("docentes.buscar")}}">
            <button type="button" class="btn btn-info" >Buscar docente</button></a>
        </div>


        <!-- Modal de Registro de docente-->
        <div class="modal fade" id="modalAgregarDocente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo docente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("docentes.create")}}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="nombreDocente" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombreD">
                        </div>
                        <div class="mb-3">
                            <label for="apellidoDocente" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellidoD">
                        </div>
                        <div class="mb-3">
                            <label for="telefonoDocente" class="form-label">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefonoD">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Mail</label>
                            <input type="email" class="form-control" id="mail" name="mailD">
                        </div>
                        <div class="mb-3">
                            <label for="rolDocente" class="form-label">Rol</label>
                            <select class="form-select" aria-label="Default select example" name="rolD">
                                <option>--Elegir rol--</option>
                                <option value="Coordinador">Coordinador</option>
                                <option value="Docente">Docente</option>
                                <option value="Preceptor">Preceptor</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="materiaDocente" class="form-label">Materia</label>                            
                            <select class='form-select' name="materiaD" id="materiaD">      
                                <option>--Elegir materia--</option>
                                <option>No corresponde</option>
                                @foreach($materias as $materia)                          
                                    <option value="{{ $materia->nombre}}">{{ $materia->nombre }}</option>
                                @endforeach
                            </select>                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                            </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>

        <!-- Modal de Nueva Materia-->
        <div class="modal fade" id="modalAgregarMateria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nueva materia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form action="{{route("materia.create")}}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="nombreMateria" class="form-label">Nombre de la materia</label>
                            <input type="text" class="form-control" id="nombre" name="nombreMateria">
                        </div>
                        <div class="mb-3">
                            <label for="anioMateria" class="form-label">Año</label>
                            <select class='form-select' name="anioMateria">
                                <option value="1">1° Año</option>
                                <option value="2">2° Año</option>
                                <option value="3">3° Año</option>
                                <option value="4">4° Año</option>
                                <option value="5">5° Año</option>
                                <option value="6">6° Año</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                    </form>
                </div>
                
            </div>
            </div>
        </div>

        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Mail</th>
            <th scope="col">Telefono</th>
            <th scope="col">Rol</th>
            <th scope="col">Materia</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            
            @foreach ($docentes as $docente)            
            <tr>
                <th>{{$docente->id}}</th>
                <td>{{$docente->nombre}}</td>
                <td>{{$docente->apellido}}</td>
                <td>{{$docente->email}}</td>
                <td>{{$docente->telefono}}</td>
                <td>{{$docente->rol}}</td>
                <td>{{$docente->materia}}</td>
                @can('docentes.update')
                <td>
                <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$docente->id}}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                </td>
                @endcan
                @can('docentes.destroy')
                <td>
                <a href="{{route("docentes.destroy", $docente->id)}}" onclick="return confirm('Se eliminarán los datos')" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i>
                @method("DELETE")
                </td>
                @endcan

                <!-- Modal de Editar-->
                
                <div class="modal fade" id="modalEditar{{$docente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route("docentes.update", $docente->id)}}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="idDocente" class="form-label" >Id Docente</label>
                                    <input type="text" class="form-control" id="id" name="idD" value={{$docente->id}} disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="nombreDocente" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombreD" value={{$docente->nombre}}>
                                </div>
                                <div class="mb-3">
                                    <label for="apellidoDocente" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellidoD" value={{$docente->apellido}}>
                                </div>
                                <div class="mb-3">
                                    <label for="telefonoDocente" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefonoD" value={{$docente->telefono}}>
                                </div>
                                <div class="mb-3">
                                    <label for="mail" class="form-label">Mail</label>
                                    <input type="email" class="form-control" id="mail" name="mailD" value={{$docente->email}} disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="rolDocente" class="form-label">Rol</label>
                                    <select class="form-select" aria-label="Default select example" name="rolD">
                                        <option>--Elegir rol--</option>                                     
                                        <option value="Coordinador">Coordinador</option>
                                        <option value="Docente">Docente</option>
                                        <option value="Preceptor">Preceptor</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="materiaDocente" class="form-label">Materia</label>
                                    <select class='form-select' name="materiaD" id="materiaD"> 
                                        <option>--Elegir materia--</option>
                                        <option>No corresponde</option>
                                        <option>{{$docente->materia}}</option>
                                        @foreach($materias as $materia)                          
                                            <option value="{{ $materia->nombre}}">{{$materia->nombre}}</option>
                                        @endforeach
                                    </select> 
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    </div>
                </div>
                
            </tr>    
            @endforeach
        
        </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$docentes->links('pagination::bootstrap-4')}}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('select[name="rolD"]').change(function() {
            var selectedRol = $(this).val();
            if (selectedRol === 'Coordinador' || selectedRol === 'Preceptor') {
                $('#materiaD option').not(':first-child, :contains("No corresponde")').hide();
                $('#materiaD').val('No corresponde').prop('disabled', true); // Deshabilitar el campo
            } else {
                $('#materiaD option').show();
                $('#materiaD').prop('disabled', false); // Habilitar el campo si no es Coordinador o Preceptor
            }
        });

        // Establecer el valor predeterminado al cargar la página
        var selectedRol = $('select[name="rolD"]').val();
        if (selectedRol === 'Coordinador' || selectedRol === 'Preceptor') {
            $('#materiaD option').not(':first-child, :contains("No corresponde")').hide();
            $('#materiaD').val('No corresponde').prop('disabled', true); // Deshabilitar el campo inicialmente
        }
    });
</script>

@endsection