@extends('layouts.app')

@section('content')

<div class= "card text-center"> 
    <div class="card-header">
            <div class="card text-bg-danger mb-3" >
                <div class="alert alert-danger">
                    <div class="fw-bold">{{ __('Desconectado') }}</div>
                </div>
                <div class="card-body">
                    <i class="fa-solid fa-user-slash fa-2xl mt-2" style="color: #000000;"></i>
                    <br><br>
                    @if (session('status'))
                        <div class="alert alert-success m-2" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Debes iniciar sesión') }}
                </div>
            </div>
    </div>
</div>
@endsection
