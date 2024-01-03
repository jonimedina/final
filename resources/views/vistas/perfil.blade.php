@extends('layouts.app')

@section('content')

<style>
.bigicon {
    font-size: 15px;
    color: #13314b;
}
</style>

<div class="row justify-content-center">
    <div class="col-md-6 align-self-center">
        <div class="well well-sm text-center">
            <form class="form-horizontal border p-4" method="post">
                <fieldset>
                    <h3 class="text-center header mb-4">Mis Datos</i></h3>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-id-card">  ID</i></span>
                        <input id="id" name="id" type="text" class="form-control" value={{$docente->id}} disabled>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="fa fa-user bigicon"> Nombre y Apellido</i></span>
                        <input id="name" name="name" type="text" class="form-control" value={{$docente->nombre}}>
                        <input id="apellido" name="apellido" type="text" class="form-control" value={{$docente->apellido}}>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="fa fa-envelope-o bigicon"> E-mail</i></span>
                        <input id="email" name="mail" type="text" class="form-control" value={{$docente->email}} disabled>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="fa fa-phone-square bigicon"> Telefono</i></span>
                        <input id="phone" name="phone" type="text" class="form-control" value={{$docente->telefono}}>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-graduation-cap"> Rol</i></span>
                        <input id="rol" name="rol" type="text" class="form-control" value={{$docente->rol}} disabled>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-chalkboard-user">  Materia</i></span>
                        <input id="materia" name="materia" type="text" class="form-control" value={{$docente->materia}} disabled>                            
                    </div>

                </fieldset>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary" type="button">Guardar Cambios</button>
                    </div>
                
            </form>
        </div>
    </div>
</div>


@endsection