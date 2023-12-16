@extends('layouts.app')

@section('content')
<div class="text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="h3 mb-3 fw-normal">Ingrese a su cuenta</h1>
            <i class="fa-solid fa-right-to-bracket fa-2xl mb-3" style="color: #000000;"></i>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
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
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
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
                            <button type="submit" class="w-20 btn btn-lg btn-primary mb-2">
                                {{ __('Ingresar') }}
                            </button>
                            <br>
                            @if (Route::has('password.request'))
                                <a class="link-info link-offset-2 text-muted link-underline-opacity-100-hover mt-5" href="{{ route('password.request') }}">
                                    {{ __('Olvidó su contraseña?') }}
                                </a>
                            @endif
                        </div>
                    
                </form>
                
            </div>
        </div>
    
</div>
</div>
@endsection
