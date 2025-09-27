@extends('layouts.auth')

@section('body-class', 'login-page')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="{{ route('login') }}"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body ">
            <p class="login-box-msg"> Login</p>

            {{-- Status Message --}}
            @session('status')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
            @endsession

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        placeholder="E-mail" value="{{ old('email') }}" />
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" />
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary"> Iniciar a sesion</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="mt-2 text-center">
                <p class="mb-1"><a href="{{ route('password.request') }}">Recuperar contraseña</a></p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center"> Registrar nuevo usuario </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection