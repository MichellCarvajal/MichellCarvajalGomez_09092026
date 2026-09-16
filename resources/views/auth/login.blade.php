@extends('layouts.app')

@section('title', 'Iniciar Sesión - Electro')

@section('content')
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Iniciar Sesión</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="#">Cuenta</a></li>
        <li class="breadcrumb-item active text-white">Iniciar Sesión</li>
    </ol>
</div>
<!-- Single Page Header End -->

<!-- Login Form Section Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="p-5 bg-light rounded shadow-sm wow fadeInUp" data-wow-delay="0.1s">
                    <div class="text-center mb-4">
                        <h4 class="text-primary border-bottom border-primary border-2 d-inline-block pb-2">Bienvenido</h4>
                        <h2 class="display-6 mt-2">Accede a tu Cuenta</h2>
                        <p class="text-muted">Inicia sesión para acceder a tus compras o al panel administrativo.</p>
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

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="form-floating mb-4">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="name@example.com" required autofocus autocomplete="username">
                            <label for="email"><i class="fas fa-envelope me-2 text-primary"></i>Correo Electrónico</label>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required autocomplete="current-password">
                            <label for="password"><i class="fas fa-lock me-2 text-primary"></i>Contraseña</label>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Remember & Forgot -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                                <label class="form-check-label text-muted" for="remember_me">Recordarme</label>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="text-primary fw-semibold small" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary rounded-pill py-3 px-5 w-100 fw-bold shadow-sm">
                            <i class="fas fa-sign-in-alt me-2"></i> Iniciar Sesión
                        </button>
                    </form>

                    <div class="text-center mt-4 pt-3 border-top">
                        <p class="text-muted mb-0">
                            ¿Aún no tienes una cuenta? 
                            <a href="{{ route('register') }}" class="text-secondary fw-bold ms-1">Registrarse aquí</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form Section End -->
@endsection
