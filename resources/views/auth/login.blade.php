@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
            <h1 class="h3 mb-3 fw-lg text-center">Ingrese a su cuenta </h1>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end"><i class="fa-solid fa-envelope fa-lg"></i>{{ __(' Email') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end"><i class="fa-solid fa-key fa-lg"></i>{{ __(' Contraseña') }}</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-1 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Recuerdáme') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    
                        <div class="text-center mb-3 mt-3">
                            <button type="submit" class="btn btn-outline-light btn-lg">
                                {{ __('Ingresar') }}
                            </button>
                            <div class="text-center mb-3 mt-3">
                            @if (Route::has('password.request'))
                                <a class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{ route('password.request') }}">
                                    {{ __('Olvidó su contraseña?') }}
                                </a>
                            @endif
                            </div>
                        </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection
