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
            <button type="button" class="btn btn-success"  data-bs-toggle="modal" data-bs-target="#modalAgregarEstudiante">Agregar estudiante</button>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-2" >
            <a href="{{route("estudiantes.buscar")}}">
            <button type="button" class="btn btn-info" >Buscar estudiante</button></a>
        </div>


        <!-- Modal de Registro de estudiantes-->
        <div class="modal fade" id="modalAgregarEstudiante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo estudiante</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route("estudiantes.create")}}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class='form-control' name="nombre" id="nombre">  
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido">
                        </div>
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="mail" name="mail">
                        </div>
                        <div class="mb-3">
                            <label for="escuela" class="form-label">Escuela de Origen</label>
                            <input type="text" class="form-control" id="escuela" name="escuela">
                        </div>
                        <div class="mb-3">
                            <label for="materia1" class="form-label">Materia 1° Módulo</label>                            
                            <input type="text" class="form-control" id="materia1" name="materia1">                        
                        </div>
                        <div class="mb-3">
                            <label for="materia2" class="form-label">Materia 2° Módulo</label>                            
                            <input type="text" class="form-control" id="materia2" name="materia2">                        
                        </div>
                        <div class="mb-3">
                            <label for="materia1" class="form-label">Retiro autorizado</label>                            
                            <select class="form-select" aria-label="Default select example" name="retiro">
                                <option>--¿Se puede retirar solo?--</option>                                     
                                <option value="0">Si</option>
                                <option value="1">No</option>
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

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">DNI</th>
                <th scope="col">Mail</th>
                <th scope="col">Escuela de origen</th>
                <th scope="col">Materia 1° Módulo</th>
                <th scope="col">Materia 2° Módulo</th>
                <th scope="col">Retiro autorizado</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                
                @foreach ($estudiantes as $estudiante)            
                <tr>
                    <th>{{$estudiante->id}}</th>
                    <td>{{$estudiante->nombre}}</td>
                    <td>{{$estudiante->apellido}}</td>
                    <td>{{$estudiante->dni}}</td>
                    <td>{{$estudiante->mail}}</td>
                    <td>{{$estudiante->escuela}}</td>
                    <td>{{$estudiante->materia1}}</td>
                    <td>{{$estudiante->materia2}}</td>
                    <td>
                        @if ($estudiante->retiro == "0") Si
                        @elseif ($estudiante->retiro == '1') No
                        @endif </td>
                    <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar{{$estudiante->id}}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                    </td>
                    <td>
                    <a href="{{route("estudiantes.destroy", $estudiante->id)}}" onclick="return confirm('Se eliminarán los datos')" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i>
                    @method("DELETE")
                    </td>
                    
    
                    <!-- Modal de Editar-->
                    
                    <div class="modal fade" id="modalEditar{{$estudiante->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route("estudiantes.update", $estudiante->id)}}" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="nombre" class="form-label">Nombre</label>
                                        <input type="text" class='form-control' name="nombre" id="nombre" value={{$estudiante->nombre}}>  
                                    </div>
                                    <div class="mb-3">
                                        <label for="apellido" class="form-label">Apellido</label>
                                        <input type="text" class="form-control" id="apellido" name="apellido" value={{$estudiante->apellido}}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dni" class="form-label">DNI</label>
                                        <input type="text" class="form-control" id="dni" name="dni" value={{$estudiante->dni}}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="mail" name="mail" value={{$estudiante->mail}}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="escuela" class="form-label">Escuela de Origen</label>
                                        <input type="text" class="form-control" id="escuela" name="escuela" value={{$estudiante->escuela}}>
                                    </div>
                                    <div class="mb-3">
                                        <label for="materia1" class="form-label">Materia 1° Módulo</label>                            
                                        <input type="text" class="form-control" id="materia1" name="materia1" value={{$estudiante->materia1}}>                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="materia2" class="form-label">Materia 2° Módulo</label>                            
                                        <input type="text" class="form-control" id="materia2" name="materia2" value={{$estudiante->materia2}}>                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="materia1" class="form-label">Retiro autorizado</label>                            
                                        <select class="form-select" aria-label="Default select example" name="retiro">
                                            <option>--¿Se puede retirar solo?--</option>                                     
                                            <option value="0">Si</option>
                                            <option value="1">No</option>
                                        </select>                        
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary">Modificar</button>
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
            {{$estudiantes->links('pagination::bootstrap-4')}}
        </div>
    </div>

@endsection