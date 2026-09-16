@extends('layouts.app')

@section('title', 'Registrarse - Electro')

@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Crear una Cuenta</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="#">Cuenta</a></li>
        <li class="breadcrumb-item active text-white">Registrarse</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Register Form Section Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="p-5 bg-light rounded shadow-sm wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center mb-4">
                        <h4 class="text-primary border-bottom border-primary border-2 d-inline-block pb-2">Únete a Nosotros</h4>
                        <h2 class="display-6 mt-2">Crea tu Cuenta</h2>
                        <p class="text-muted">Completa el formulario para acceder al panel y realizar tus compras.</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger py-2 mb-4">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Full Name -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Tu Nombre Completo" required autofocus autocomplete="name">
                            <label for="name"><i class="fas fa-user me-2 text-primary"></i>Nombre Completo</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autocomplete="username">
                            <label for="email"><i class="fas fa-envelope me-2 text-primary"></i>Correo Electrónico</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="new-password">
                            <label for="password"><i class="fas fa-lock me-2 text-primary"></i>Contraseña</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            <label for="password_confirmation"><i class="fas fa-shield-alt me-2 text-primary"></i>Confirmar Contraseña</label>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5 w-100 fw-bold shadow-sm">
                            <i class="fas fa-user-plus me-2"></i> Crear Cuenta y Acceder
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="text-muted mb-0">
                            ¿Ya tienes una cuenta? 
                            <a href="{{ route('login') }}" class="text-secondary fw-bold ms-1">Inicia sesión aquí</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Form Section End -->
@endsection
