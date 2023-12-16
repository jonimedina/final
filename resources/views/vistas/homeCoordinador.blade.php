@extends('layouts.app')

@section('content')

<body>


<div class="container py-1">    
    <div class="row row-cols-1 row-cols-md-2 mb-2 text-center">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm" style="background-color: #7bdff2">
                <div class="card-header py-3" style="background-color: #16bddf">
                    <h2 class="my-0 fw-normal">Docente</h2>
                </div>

                <div class="card-body">
                    <h4 class="card-title pricing-card-title">Acciones</h4>
                    <ul class="list-unstyled mt-3 mb-4">
                    <li>Agregar nuevo docente</li>
                    <li>Modificar datos de docente</li>
                    <li>Dar de baja un docente</li>
                    </ul>
                <a href="{{route("docentes.index")}}" type="button" class="w-100 btn btn-lg btn-primary" style="background-color: #0e7387; border-color:#000000"> Ingresar</a>
                </div>
            </div>
        </div>
    

    <div class="col">
        <div class="card mb-4 rounded-3 shadow-sm" style="background-color: #ebcc70">
            <div class="card-header py-3" style="background-color: #c49a1c">
                    <h2 class="my-0 fw-normal">Estudiante</h2>
            </div>
            <div class="card-body">
                <h4 class="card-title pricing-card-title">Acciones</h4>
                <ul class="list-unstyled mt-3 mb-4">
                <li>Agregar nuevo estudiante</li>
                <li>Modificar datos de un estudiante</li>
                <li>Dar de baja un estudiante</li>
                </ul>
                <a href="#" type="button" class="w-100 btn btn-lg btn-primary" style="background-color: #927316; border-color: #000000" >Ingresar</a>
            </div>
        </div>
    </div>
    

@endsection
