<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="adminHMD professional admin dashboard">
  <title>@yield('title', 'Dashboard') | {{ config('app.name', 'adminHMD') }}</title>

  <!-- Admin Template CSS -->
  <link rel="stylesheet" href="{{ asset('adminhmd/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminhmd/vendors/bootstrap-icons/bootstrap-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('adminhmd/css/style.css') }}">
  @stack('styles')
</head>

<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

    <!-- Sidebar Start -->
    <aside class="admin-sidebar" id="adminSidebar" aria-label="Main navigation">
      <div class="sidebar-header">
        <a class="brand-mark" href="{{ route('dashboard') }}" aria-label="adminHMD dashboard">
          <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
          <span class="brand-copy">
            <span class="brand-title">adminHMD</span>
            <span class="brand-subtitle">Admin Workspace</span>
          </span>
        </a>
      </div>

      <nav class="sidebar-nav">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
          <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
          <span class="nav-text">Dashboard</span>
        </a>
        <a class="nav-link" href="{{ route('home') }}" target="_blank">
          <span class="nav-icon"><i class="bi bi-shop" aria-hidden="true"></i></span>
          <span class="nav-text">Ver Tienda / Landing</span>
        </a>
        <a class="nav-link" href="#">
          <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
          <span class="nav-text">Usuarios</span>
        </a>
        <a class="nav-link" href="#">
          <span class="nav-icon"><i class="bi bi-cart3" aria-hidden="true"></i></span>
          <span class="nav-text">Órdenes</span>
        </a>
        <a class="nav-link" href="#">
          <span class="nav-icon"><i class="bi bi-bar-chart-line" aria-hidden="true"></i></span>
          <span class="nav-text">Estadísticas</span>
        </a>
        <a class="nav-link" href="#">
          <span class="nav-icon"><i class="bi bi-table" aria-hidden="true"></i></span>
          <span class="nav-text">Productos</span>
        </a>
        <a class="nav-link" href="#">
          <span class="nav-icon"><i class="bi bi-gear" aria-hidden="true"></i></span>
          <span class="nav-text">Configuración</span>
        </a>
      </nav>

      <div class="sidebar-user">
        <img class="avatar-img avatar-md sidebar-user-avatar" src="{{ asset('adminhmd/images/avatar/avatar.jpg') }}" alt="{{ Auth::user()->name ?? 'User' }}">
        <strong>{{ Auth::user()->name ?? 'Usuario' }}</strong>
        <small class="text-truncate d-block" style="max-width: 170px;">{{ Auth::user()->email ?? 'admin@example.com' }}</small>
      </div>

      <div class="sidebar-footer">
        <span class="status-dot"></span>
        <span class="sidebar-footer-text">Sistema en línea</span>
      </div>
    </aside>
    <!-- Sidebar End -->

    <!-- Main Wrapper Start -->
    <div class="admin-main">
      <!-- Navbar Start -->
      <nav class="navbar admin-navbar navbar-expand bg-white">
        <div class="container-fluid px-3 px-lg-4">
          <button class="sidebar-toggle" type="button" data-sidebar-toggle aria-controls="adminSidebar" aria-expanded="true" aria-label="Toggle sidebar">
            <span></span>
            <span></span>
            <span></span>
          </button>

          <form class="d-none d-md-flex ms-3 flex-grow-1" role="search" onsubmit="event.preventDefault();">
            <input class="form-control search-input" type="search" placeholder="Buscar órdenes, productos, clientes..." aria-label="Buscar">
          </form>

          <div class="navbar-actions ms-auto">
            <!-- Theme Toggle -->
            <button class="icon-button theme-toggle" type="button" data-theme-toggle aria-label="Cambiar tema" title="Cambiar tema">
              <i class="bi bi-moon-stars" data-theme-icon aria-hidden="true"></i>
            </button>

            <!-- Notifications Dropdown -->
            <div class="dropdown">
              <button class="icon-button" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Notificaciones">
                <span class="notification-dot"></span>
                <i class="bi bi-bell" aria-hidden="true"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-end notification-menu">
                <div class="dropdown-header fw-bold text-body">Notificaciones</div>
                <a class="dropdown-item" href="#">
                  <span class="notification-title">Nueva orden #1084</span>
                  <span class="notification-time">Hace 5 minutos</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span class="notification-title">Meta de ventas alcanzada</span>
                  <span class="notification-time">Hace 30 minutos</span>
                </a>
                <a class="dropdown-item" href="#">
                  <span class="notification-title">Nuevo usuario registrado</span>
                  <span class="notification-time">Hace 1 hora</span>
                </a>
              </div>
            </div>

            <!-- User Dropdown -->
            <div class="dropdown">
              <button class="profile-button dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="avatar-img avatar-sm" src="{{ asset('adminhmd/images/avatar/avatar.jpg') }}" alt="{{ Auth::user()->name ?? 'User' }}">
                <span class="profile-name d-none d-sm-inline">{{ Auth::user()->name ?? 'Usuario' }}</span>
              </button>
              <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li class="dropdown-header">
                  <div class="fw-bold">{{ Auth::user()->name ?? 'Usuario' }}</div>
                  <small class="text-muted">{{ Auth::user()->email ?? '' }}</small>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <a class="dropdown-item" href="{{ route('home') }}">
                    <i class="bi bi-shop me-2"></i> Ir a la Tienda
                  </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                  <!-- Logout Form -->
                  <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                      <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                    </button>
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- Navbar End -->

      <!-- Dashboard Main Content Start -->
      <main class="dashboard-content">
        @yield('content')
      </main>
      <!-- Dashboard Main Content End -->

      <!-- Footer Start -->
      <footer class="admin-footer">
        <div class="container-fluid px-3 px-lg-4">
          <span>&copy; {{ date('Y') }} <strong>adminHMD</strong>. Integrado para la tienda Electro.</span>
          <span>Panel de Administración</span>
        </div>
      </footer>
      <!-- Footer End -->
    </div>
    <!-- Main Wrapper End -->
  </div>

  <!-- Scripts -->
  <script src="{{ asset('adminhmd/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminhmd/js/main.js') }}"></script>
  @stack('scripts')
</body>
</html>
