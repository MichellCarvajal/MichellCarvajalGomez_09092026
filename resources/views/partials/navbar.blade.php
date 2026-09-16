<!-- Topbar Start -->
<div class="container-fluid px-5 d-none border-bottom d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-4 text-center text-lg-start mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a href="{{ route('contact') }}" class="text-muted me-2"><i class="fas fa-info-circle me-1"></i>Help</a><small> / </small>
                <a href="{{ route('contact') }}" class="text-muted mx-2"><i class="fas fa-headset me-1"></i>Support</a><small> / </small>
                <a href="{{ route('contact') }}" class="text-muted ms-2"><i class="fas fa-envelope me-1"></i>Contact</a>
            </div>
        </div>
        <div class="col-lg-4 text-center d-flex align-items-center justify-content-center">
            <small class="text-dark me-2"><i class="fas fa-phone-alt me-1 text-primary"></i>Call Us:</small>
            <a href="tel:+0121234567890" class="text-muted">(+012) 1234 567890</a>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-muted me-2" data-bs-toggle="dropdown"><small>USD</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item">USD</a>
                        <a href="#" class="dropdown-item">EUR</a>
                        <a href="#" class="dropdown-item">COP</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-muted mx-2" data-bs-toggle="dropdown"><small>Español</small></a>
                    <div class="dropdown-menu rounded">
                        <a href="#" class="dropdown-item">Español</a>
                        <a href="#" class="dropdown-item">English</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-muted ms-2" data-bs-toggle="dropdown">
                        <small>
                            <i class="fa fa-user me-1"></i>
                            @auth
                                {{ Auth::user()->name }}
                            @else
                                Mi Cuenta
                            @endauth
                        </small>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end rounded shadow-sm">
                        @auth
                            <div class="dropdown-header fw-bold text-dark border-bottom mb-2 pb-2">
                                <small class="text-muted d-block">Conectado como</small>
                                {{ Auth::user()->name }}
                            </div>
                            <a href="{{ route('dashboard') }}" class="dropdown-item text-primary fw-semibold"><i class="fas fa-tachometer-alt me-2"></i>Ir al Dashboard</a>
                            <a href="{{ route('checkout') }}" class="dropdown-item"><i class="fas fa-credit-card me-2"></i>Checkout</a>
                            <a href="{{ route('cart') }}" class="dropdown-item"><i class="fas fa-shopping-cart me-2"></i>Mi Carrito</a>
                            <a href="{{ route('bestseller') }}" class="dropdown-item"><i class="fas fa-heart me-2"></i>Wishlist</a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="dropdown-item fw-semibold text-primary"><i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión</a>
                            <a href="{{ route('register') }}" class="dropdown-item"><i class="fas fa-user-plus me-2"></i>Registrarse</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('cart') }}" class="dropdown-item"><i class="fas fa-shopping-cart me-2"></i>Mi Carrito</a>
                            <a href="{{ route('shop') }}" class="dropdown-item"><i class="fas fa-th me-2"></i>Productos</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Header Search & Brand Start -->
<div class="container-fluid px-5 py-4 d-none d-lg-block">
    <div class="row gx-0 align-items-center text-center">
        <div class="col-md-4 col-lg-3 text-center text-lg-start">
            <div class="d-inline-flex align-items-center">
                <a href="{{ route('home') }}" class="navbar-brand p-0">
                    <h1 class="display-5 text-primary m-0"><i class="fas fa-shopping-bag text-secondary me-2"></i>Electro</h1>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-lg-6 text-center">
            <div class="position-relative ps-4">
                <form action="{{ route('shop') }}" method="GET" class="d-flex border rounded-pill">
                    <input class="form-control border-0 rounded-pill w-100 py-3" type="text" name="q" placeholder="Buscar productos en la tienda...">
                    <select name="category" class="form-select text-dark border-0 border-start rounded-0 p-3" style="width: 200px;">
                        <option value="">Todas las Categorías</option>
                        <option value="Accessories">Accesorios</option>
                        <option value="Electronics">Electrónica & Computo</option>
                        <option value="Laptops">Laptops & Desktops</option>
                        <option value="Mobiles">Móviles & Tablets</option>
                        <option value="SmartPhone">SmartPhone & TV</option>
                    </select>
                    <button type="submit" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 text-center text-lg-end">
            <div class="d-inline-flex align-items-center">
                <a href="{{ route('shop') }}" class="text-muted d-flex align-items-center justify-content-center me-3" title="Compare Products">
                    <span class="rounded-circle btn-md-square border"><i class="fas fa-random"></i></span>
                </a>
                <a href="{{ route('bestseller') }}" class="text-muted d-flex align-items-center justify-content-center me-3" title="Wishlist">
                    <span class="rounded-circle btn-md-square border"><i class="fas fa-heart"></i></span>
                </a>
                <a href="{{ route('cart') }}" class="text-muted d-flex align-items-center justify-content-center" title="Shopping Cart">
                    <span class="rounded-circle btn-md-square border"><i class="fas fa-shopping-cart"></i></span>
                    <span class="text-dark ms-2 fw-bold">$0.00</span>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->

<!-- Navbar & Hero Start -->
<div class="container-fluid nav-bar p-0">
    <div class="row gx-0 bg-primary px-5 align-items-center">
        <div class="col-lg-3 d-none d-lg-block">
            <nav class="navbar navbar-light position-relative" style="width: 250px;">
                <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start text-white" type="button" data-bs-toggle="collapse" data-bs-target="#allCat">
                    <h4 class="m-0 text-white"><i class="fa fa-bars me-2"></i>Categorías</h4>
                </button>
                <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                    <div class="navbar-nav ms-auto py-0">
                        <ul class="list-unstyled categories-bars">
                            <li>
                                <div class="categories-bars-item">
                                    <a href="{{ route('shop') }}">Accesorios</a>
                                    <span>(3)</span>
                                </div>
                            </li>
                            <li>
                                <div class="categories-bars-item">
                                    <a href="{{ route('shop') }}">Electrónica</a>
                                    <span>(5)</span>
                                </div>
                            </li>
                            <li>
                                <div class="categories-bars-item">
                                    <a href="{{ route('shop') }}">Laptops</a>
                                    <span>(2)</span>
                                </div>
                            </li>
                            <li>
                                <div class="categories-bars-item">
                                    <a href="{{ route('shop') }}">Móviles & Tablets</a>
                                    <span>(8)</span>
                                </div>
                            </li>
                            <li>
                                <div class="categories-bars-item">
                                    <a href="{{ route('shop') }}">SmartPhone & TV</a>
                                    <span>(5)</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col-12 col-lg-9">
            <nav class="navbar navbar-expand-lg navbar-light bg-primary">
                <a href="{{ route('home') }}" class="navbar-brand d-block d-lg-none">
                    <h1 class="display-5 text-secondary m-0"><i class="fas fa-shopping-bag text-white me-2"></i>Electro</h1>
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars fa-1x text-white"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav me-auto py-0">
                        <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Inicio</a>
                        <a href="{{ route('shop') }}" class="nav-item nav-link {{ request()->routeIs('shop') ? 'active' : '' }}">Tienda</a>
                        <a href="{{ route('single') }}" class="nav-item nav-link {{ request()->routeIs('single') ? 'active' : '' }}">Detalles</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle {{ (request()->routeIs('bestseller') || request()->routeIs('cart') || request()->routeIs('checkout') || request()->routeIs('notfound')) ? 'active' : '' }}" data-bs-toggle="dropdown">Páginas</a>
                            <div class="dropdown-menu m-0 shadow">
                                <a href="{{ route('bestseller') }}" class="dropdown-item {{ request()->routeIs('bestseller') ? 'active' : '' }}">Más Vendidos</a>
                                <a href="{{ route('cart') }}" class="dropdown-item {{ request()->routeIs('cart') ? 'active' : '' }}">Carrito</a>
                                <a href="{{ route('checkout') }}" class="dropdown-item {{ request()->routeIs('checkout') ? 'active' : '' }}">Pagar</a>
                                <a href="{{ route('notfound') }}" class="dropdown-item {{ request()->routeIs('notfound') ? 'active' : '' }}">Error 404</a>
                            </div>
                        </div>
                        <a href="{{ route('contact') }}" class="nav-item nav-link me-2 {{ request()->routeIs('contact') ? 'active' : '' }}">Contacto</a>
                    </div>
                    
                    <div class="d-flex align-items-center flex-wrap gap-2 py-2 py-lg-0">
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-light rounded-pill py-2 px-3 fw-bold">
                                <i class="fas fa-tachometer-alt me-1"></i> Dashboard
                            </a>
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light rounded-pill py-2 px-3" title="Cerrar Sesión">
                                    <i class="fas fa-sign-out-alt me-1"></i> Salir
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-light rounded-pill py-2 px-3">
                                <i class="fas fa-sign-in-alt me-1"></i> Iniciar Sesión
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-light rounded-pill py-2 px-3">
                                <i class="fas fa-user-plus me-1"></i> Registrarse
                            </a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- Navbar & Hero End -->
