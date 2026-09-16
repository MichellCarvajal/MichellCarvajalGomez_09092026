@extends('layouts.app')

@section('title', 'Recuperar Contraseña - Electro')

@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Recuperar Contraseña</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('login') }}">Cuenta</a></li>
        <li class="breadcrumb-item active text-white">Recuperar</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Forgot Password Form Section Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="p-5 bg-light rounded shadow-sm wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center mb-4">
                        <h4 class="text-primary border-bottom border-primary border-2 d-inline-block pb-2">Seguridad</h4>
                        <h2 class="display-6 mt-2">¿Olvidaste tu Clave?</h2>
                        <p class="text-muted">Ingresa tu correo electrónico y te enviaremos un enlace para que puedas crear una nueva contraseña.</p>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success py-2 mb-4">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email -->
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus autocomplete="username">
                            <label for="email"><i class="fas fa-envelope me-2 text-primary"></i>Correo Electrónico</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5 w-100 fw-bold shadow-sm">
                            <i class="fas fa-paper-plane me-2"></i> Enviar Enlace de Restablecimiento
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="text-muted mb-0">
                            ¿Recordaste tu clave? 
                            <a href="{{ route('login') }}" class="text-secondary fw-bold ms-1">Volver a Iniciar Sesión</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Forgot Password Form Section End -->
@endsection
