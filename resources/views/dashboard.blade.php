@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid px-3 px-lg-4 py-4">
  <!-- Page Heading -->
  <div class="page-heading">
    <div class="page-heading-copy">
      <span class="page-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
      <div>
        <p class="eyebrow mb-1">Bienvenido de nuevo, {{ Auth::user()->name }}</p>
        <h1 class="h3 mb-1">Panel de Control</h1>
        <p class="text-muted mb-0">Supervisa las ventas, usuarios, inventario y soporte de la tienda Electro desde este panel centralizado.</p>
      </div>
    </div>
    <div class="heading-actions">
      <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-sm" target="_blank">
        <i class="bi bi-box-arrow-up-right me-1" aria-hidden="true"></i> Ver Tienda
      </a>
      <button class="btn btn-primary btn-sm" type="button">
        <i class="bi bi-file-earmark-plus me-1" aria-hidden="true"></i> Generar Reporte
      </button>
    </div>
  </div>

  <!-- Metric Cards Section -->
  <section class="row g-3 mt-1" aria-label="Dashboard metrics">
    <div class="col-12 col-sm-6 col-xl-3">
      <article class="metric-card metric-primary">
        <div class="metric-top">
          <span class="metric-label">Ingresos Totales</span>
          <span class="metric-icon"><i class="bi bi-currency-dollar" aria-hidden="true"></i></span>
        </div>
        <div class="metric-value">$48,240</div>
        <div class="metric-meta">
          <span class="text-success">+12.5%</span>
          <span>respecto al mes anterior</span>
        </div>
      </article>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
      <article class="metric-card metric-success">
        <div class="metric-top">
          <span class="metric-label">Órdenes Realizadas</span>
          <span class="metric-icon"><i class="bi bi-bag-check" aria-hidden="true"></i></span>
        </div>
        <div class="metric-value">1,284</div>
        <div class="metric-meta">
          <span class="text-success">+8.2%</span>
          <span>nuevas órdenes</span>
        </div>
      </article>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
      <article class="metric-card metric-warning">
        <div class="metric-top">
          <span class="metric-label">Clientes Registrados</span>
          <span class="metric-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
        </div>
        <div class="metric-value">8,742</div>
        <div class="metric-meta">
          <span class="text-success">+5.1%</span>
          <span>usuarios activos</span>
        </div>
      </article>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
      <article class="metric-card metric-danger">
        <div class="metric-top">
          <span class="metric-label">Tickets de Soporte</span>
          <span class="metric-icon"><i class="bi bi-life-preserver" aria-hidden="true"></i></span>
        </div>
        <div class="metric-value">36</div>
        <div class="metric-meta">
          <span class="text-danger">3 urgentes</span>
          <span>por atender</span>
        </div>
      </article>
    </div>
  </section>

  <!-- Charts & Activity Section -->
  <section class="row g-3 mt-1">
    <div class="col-12 col-xl-8">
      <div class="panel">
        <div class="panel-header">
          <div>
            <h2 class="h5 mb-1 section-title"><i class="bi bi-graph-up-arrow" aria-hidden="true"></i><span>Rendimiento de Ventas</span></h2>
            <p class="text-muted mb-0">Ingresos mensuales en comparación con las metas operativas.</p>
          </div>
          <button class="btn btn-light btn-sm" type="button">Ver Detalles</button>
        </div>

        <div class="chart-bars" aria-label="Sales performance chart">
          <div class="chart-column bar-42"><span></span><small>Ene</small></div>
          <div class="chart-column bar-58"><span></span><small>Feb</small></div>
          <div class="chart-column bar-51"><span></span><small>Mar</small></div>
          <div class="chart-column bar-72"><span></span><small>Abr</small></div>
          <div class="chart-column bar-66"><span></span><small>May</small></div>
          <div class="chart-column bar-83"><span></span><small>Jun</small></div>
        </div>
      </div>
    </div>

    <div class="col-12 col-xl-4">
      <div class="panel h-100">
        <div class="panel-header">
          <div>
            <h2 class="h5 mb-1 section-title"><i class="bi bi-activity" aria-hidden="true"></i><span>Actividad del Equipo</span></h2>
            <p class="text-muted mb-0">Actualizaciones recientes de la plataforma.</p>
          </div>
        </div>

        <div class="activity-list">
          <div class="activity-item">
            <span class="activity-dot bg-primary"></span>
            <div>
              <p class="mb-1 fw-semibold">Nueva campaña promocional</p>
              <p class="text-muted small mb-0">Se activaron los descuentos para smartphones y accesorios.</p>
            </div>
          </div>
          <div class="activity-item">
            <span class="activity-dot bg-success"></span>
            <div>
              <p class="mb-1 fw-semibold">Lote de pagos procesado</p>
              <p class="text-muted small mb-0">246 facturas fueron procesadas con éxito.</p>
            </div>
          </div>
          <div class="activity-item">
            <span class="activity-dot bg-warning"></span>
            <div>
              <p class="mb-1 fw-semibold">Cola de soporte activa</p>
              <p class="text-muted small mb-0">Tiempo de respuesta promedio: 14 minutos.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Recent Orders Table -->
  <section class="panel mt-3">
    <div class="panel-header">
      <div>
        <h2 class="h5 mb-1 section-title"><i class="bi bi-clock-history" aria-hidden="true"></i><span>Últimas Transacciones y Órdenes</span></h2>
        <p class="text-muted mb-0">Resumen de pedidos recientes en la tienda Electro.</p>
      </div>
      <a class="btn btn-light btn-sm" href="{{ route('shop') }}" target="_blank">Ver Catálogo</a>
    </div>

    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th>Cliente</th>
            <th>Producto / Servicio</th>
            <th>Categoría</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th class="text-end">Acción</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="d-flex align-items-center gap-2">
                <img class="avatar-img avatar-sm" src="{{ asset('adminhmd/images/avatar/avatar.jpg') }}" alt="Alex Taylor">
                <div>
                  <p class="fw-semibold mb-0">Alex Taylor</p>
                  <p class="text-muted small mb-0">alex.t@example.com</p>
                </div>
              </div>
            </td>
            <td>Laptop Gaming Ultra Pro</td>
            <td>Laptops</td>
            <td><span class="badge text-bg-success">Completado</span></td>
            <td>{{ date('M d, Y') }}</td>
            <td class="text-end"><button class="btn btn-light btn-sm" type="button">Detalles</button></td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center gap-2">
                <img class="avatar-img avatar-sm" src="{{ asset('adminhmd/images/avatar/avatar.jpg') }}" alt="Maria Silva">
                <div>
                  <p class="fw-semibold mb-0">Maria Silva</p>
                  <p class="text-muted small mb-0">maria.s@example.com</p>
                </div>
              </div>
            </td>
            <td>Smartphone Galaxy Z Flip</td>
            <td>Smartphones</td>
            <td><span class="badge text-bg-warning">Pendiente</span></td>
            <td>{{ date('M d, Y') }}</td>
            <td class="text-end"><button class="btn btn-light btn-sm" type="button">Detalles</button></td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center gap-2">
                <img class="avatar-img avatar-sm" src="{{ asset('adminhmd/images/avatar/avatar.jpg') }}" alt="Jon Oliver">
                <div>
                  <p class="fw-semibold mb-0">Jon Oliver</p>
                  <p class="text-muted small mb-0">jon@example.com</p>
                </div>
              </div>
            </td>
            <td>Auriculares Inalámbricos Noise Cancelling</td>
            <td>Accesorios</td>
            <td><span class="badge text-bg-success">Completado</span></td>
            <td>{{ date('M d, Y') }}</td>
            <td class="text-end"><button class="btn btn-light btn-sm" type="button">Detalles</button></td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>
</div>
@endsection
