@extends('layouts.app')

@section('title', 'Carrito de Compras - Electro')

@push('styles')
<style>
    /* ── Cart table ────────────────────────────────── */
    .cart-table thead th {
        font-weight: 700;
        text-transform: uppercase;
        font-size: .78rem;
        letter-spacing: .06em;
        color: #6c757d;
        border-bottom: 2px solid #dee2e6;
        padding: 14px 12px;
    }

    .cart-table tbody tr {
        transition: background .15s;
    }

    .cart-table tbody tr:hover {
        background: #f9f9fb;
    }

    .cart-table td, .cart-table th {
        vertical-align: middle;
        padding: 14px 12px;
    }

    /* ── Product image ─────────────────────────────── */
    .cart-product-img {
        width: 72px;
        height: 72px;
        object-fit: cover;
        border-radius: 10px;
        border: 1px solid #e9ecef;
    }

    /* ── Quantity spinner ──────────────────────────── */
    .qty-group {
        display: inline-flex;
        align-items: center;
        border: 1px solid #dee2e6;
        border-radius: 50px;
        overflow: hidden;
        background: #fff;
        width: 110px;
    }

    .qty-group .qty-btn {
        border: none;
        background: transparent;
        width: 34px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: .85rem;
        color: #495057;
        transition: background .15s, color .15s;
        flex-shrink: 0;
    }

    .qty-group .qty-btn:hover {
        background: var(--bs-primary);
        color: #fff;
    }

    .qty-group .qty-input {
        border: none;
        text-align: center;
        width: 42px;
        font-weight: 600;
        font-size: .9rem;
        background: transparent;
        -moz-appearance: textfield;
    }

    .qty-group .qty-input::-webkit-outer-spin-button,
    .qty-group .qty-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }

    /* ── Remove btn ────────────────────────────────── */
    .btn-remove {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border: 1px solid #dee2e6;
        background: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background .15s, border-color .15s;
        cursor: pointer;
    }

    .btn-remove:hover {
        background: #dc3545;
        border-color: #dc3545;
    }

    .btn-remove:hover i {
        color: #fff !important;
    }

    /* ── Totals card ───────────────────────────────── */
    .totals-card {
        border-radius: 14px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0,0,0,.08);
        border: none;
    }

    .totals-card .card-header {
        background: linear-gradient(135deg, var(--bs-primary), var(--bs-secondary));
        color: #fff;
        padding: 18px 24px;
        border: none;
    }

    .totals-card .row-line {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 24px;
        border-bottom: 1px solid #f0f0f0;
    }

    .totals-card .row-line:last-of-type {
        border-bottom: none;
    }

    .totals-card .total-row {
        background: #fafafa;
        font-weight: 700;
        font-size: 1.1rem;
        padding: 16px 24px;
        border-top: 2px solid #dee2e6;
    }

    /* ── Shipping badge ────────────────────────────── */
    #shipping-label.free {
        color: #198754;
        font-weight: 700;
    }

    /* ── Empty state ───────────────────────────────── */
    .empty-cart {
        text-align: center;
        padding: 60px 20px;
        color: #adb5bd;
    }

    .empty-cart i {
        font-size: 4rem;
        margin-bottom: 16px;
    }

    /* ── Toast ─────────────────────────────────────── */
    #cart-toast {
        position: fixed;
        bottom: 28px;
        right: 28px;
        z-index: 9999;
        min-width: 240px;
        border-radius: 10px;
        box-shadow: 0 6px 20px rgba(0,0,0,.15);
        display: none;
        padding: 14px 20px;
        font-weight: 600;
        font-size: .9rem;
        color: #fff;
    }

    #cart-toast.success { background: #198754; }
    #cart-toast.danger  { background: #dc3545; }

    /* ── Loading overlay on row ────────────────────── */
    .row-loading { opacity: .4; pointer-events: none; }
</style>
@endpush

@section('content')
<!-- Page Header -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6 wow fadeInUp" data-wow-delay="0.1s">Carrito de Compras</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInUp" data-wow-delay="0.3s">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{ route('shop') }}">Tienda</a></li>
        <li class="breadcrumb-item active text-white">Carrito</li>
    </ol>
</div>

<!-- Cart Page -->
<div class="container-fluid py-5">
    <div class="container py-5">

        {{-- ── Products table ── --}}
        <div class="table-responsive mb-5">
            <table class="table cart-table" id="cart-table">
                <thead>
                    <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="cart-tbody">
                    @forelse ($items as $item)
                    <tr id="row-{{ $item['id'] }}" data-product-id="{{ $item['id'] }}" data-price="{{ $item['price'] }}">
                        {{-- Name + image --}}
                        <th scope="row">
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ $item['image'] }}"
                                     alt="{{ $item['name'] }}"
                                     class="cart-product-img"
                                     onerror="this.src='https://via.placeholder.com/72x72?text=📱'">
                                <div>
                                    <p class="mb-0 fw-semibold">{{ $item['name'] }}</p>
                                </div>
                            </div>
                        </th>

                        {{-- Model --}}
                        <td>
                            <span class="text-muted small">{{ $item['model'] }}</span>
                        </td>

                        {{-- Unit price --}}
                        <td>
                            <span class="fw-semibold">${{ number_format($item['price'], 2) }}</span>
                        </td>

                        {{-- Quantity spinner --}}
                        <td>
                            <div class="qty-group">
                                <button class="qty-btn btn-minus" data-id="{{ $item['id'] }}" aria-label="Disminuir cantidad">
                                    <i class="fa fa-minus"></i>
                                </button>
                                <input type="number"
                                       class="qty-input"
                                       id="qty-{{ $item['id'] }}"
                                       value="{{ $item['qty'] }}"
                                       min="1"
                                       aria-label="Cantidad de {{ $item['name'] }}">
                                <button class="qty-btn btn-plus" data-id="{{ $item['id'] }}" aria-label="Aumentar cantidad">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </td>

                        {{-- Line total --}}
                        <td>
                            <span class="fw-bold text-primary" id="line-{{ $item['id'] }}">
                                ${{ number_format($item['line_total'], 2) }}
                            </span>
                        </td>

                        {{-- Remove --}}
                        <td>
                            <button class="btn-remove btn-remove-item" data-id="{{ $item['id'] }}" aria-label="Eliminar {{ $item['name'] }}">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr id="empty-row">
                        <td colspan="6">
                            <div class="empty-cart">
                                <i class="fas fa-shopping-cart"></i>
                                <p class="h5 mt-2">Tu carrito está vacío</p>
                                <a href="{{ route('shop') }}" class="btn btn-primary rounded-pill px-4 mt-3">
                                    <i class="fas fa-store me-2"></i>Ir a la tienda
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- ── Coupon + Totals ── --}}
        <div class="row g-4 justify-content-end">
            {{-- Coupon (left) --}}
            <div class="col-lg-6 col-xl-7 d-flex align-items-start pt-2">
                <div class="d-flex flex-wrap gap-2 w-100">
                    <input type="text"
                           id="coupon-input"
                           class="form-control rounded-pill"
                           style="max-width:280px"
                           placeholder="Código de cupón">
                    <button class="btn btn-primary rounded-pill px-4" type="button" id="apply-coupon">
                        Aplicar cupón
                    </button>
                </div>
            </div>

            {{-- Totals card (right) --}}
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
                <div class="card totals-card">
                    <div class="card-header">
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-receipt me-2"></i>Resumen del pedido
                        </h5>
                    </div>

                    <div class="row-line">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-semibold" id="summary-subtotal">
                            ${{ number_format($subtotal, 2) }}
                        </span>
                    </div>

                    <div class="row-line">
                        <span class="text-muted">
                            Envío
                            <small class="d-block text-muted" style="font-size:.75rem">
                                @if ($shipping == 0 && $subtotal > 0)
                                    Compra ≥ $500
                                @elseif ($subtotal == 0)
                                    Sin productos
                                @elseif ($shipping == 9.99)
                                    Compra $100–$499
                                @else
                                    Compra < $100
                                @endif
                            </small>
                        </span>
                        <span class="fw-semibold {{ $shipping == 0 && $subtotal > 0 ? 'text-success' : '' }}"
                              id="shipping-label">
                            {{ $shippingLabel }}
                        </span>
                    </div>

                    <div class="row-line total-row">
                        <span>Total</span>
                        <span class="text-primary fs-5" id="summary-total">
                            ${{ number_format($total, 2) }}
                        </span>
                    </div>

                    <div class="p-4 pt-3">
                        <a href="{{ route('checkout') }}"
                           class="btn btn-primary rounded-pill w-100 py-3 text-uppercase fw-bold"
                           id="checkout-btn">
                            <i class="fas fa-lock me-2"></i>Proceder al pago
                        </a>
                        <a href="{{ route('shop') }}" class="btn btn-outline-secondary rounded-pill w-100 py-2 mt-2">
                            <i class="fas fa-arrow-left me-2"></i>Seguir comprando
                        </a>
                    </div>
                </div>

                {{-- Shipping progress hint --}}
                <div class="mt-3 px-1" id="shipping-hint">
                    @if ($subtotal < 500 && $subtotal > 0)
                    <div class="d-flex justify-content-between small text-muted mb-1">
                        <span>Envío gratis al llegar a $500.00</span>
                        <span>${{ number_format(max(0, 500 - $subtotal), 2) }} restantes</span>
                    </div>
                    <div class="progress" style="height: 6px; border-radius: 50px;">
                        <div class="progress-bar bg-success"
                             id="shipping-progress"
                             role="progressbar"
                             style="width: {{ min(100, ($subtotal / 500) * 100) }}%">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>

{{-- Toast notification --}}
<div id="cart-toast"></div>
@endsection

@push('scripts')
<script>
(function () {
    'use strict';

    // ── Config ──────────────────────────────────────────────
    const CSRF        = document.querySelector('meta[name="csrf-token"]').content;
    const URL_UPDATE  = '{{ route("cart.update") }}';
    const URL_REMOVE  = '{{ route("cart.remove") }}';

    // ── Helpers ─────────────────────────────────────────────
    function showToast(msg, type = 'success') {
        const t = document.getElementById('cart-toast');
        t.textContent = msg;
        t.className   = type;
        t.style.display = 'block';
        clearTimeout(t._timer);
        t._timer = setTimeout(() => { t.style.display = 'none'; }, 2800);
    }

    function fmt(n) {
        return '$' + parseFloat(n).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    function setRowLoading(row, loading) {
        row.classList.toggle('row-loading', loading);
    }

    // ── Update DOM totals after any AJAX response ────────────
    function applyTotals(data) {
        document.getElementById('summary-subtotal').textContent = fmt(data.subtotal);
        document.getElementById('summary-total').textContent    = fmt(data.total);

        const shippingEl = document.getElementById('shipping-label');
        shippingEl.textContent = data.shippingLabel;
        shippingEl.classList.toggle('text-success', parseFloat(data.shipping) === 0 && parseFloat(data.subtotal) > 0);

        // Progress bar
        updateProgressBar(parseFloat(data.subtotal));
    }

    function updateProgressBar(subtotal) {
        const hint    = document.getElementById('shipping-hint');
        const bar     = document.getElementById('shipping-progress');

        if (!hint) return;

        if (subtotal >= 500 || subtotal === 0) {
            hint.innerHTML = '';
            return;
        }

        const pct       = Math.min(100, (subtotal / 500) * 100).toFixed(1);
        const remaining = Math.max(0, 500 - subtotal).toFixed(2);

        hint.innerHTML = `
            <div class="d-flex justify-content-between small text-muted mb-1">
                <span>Envío gratis al llegar a $500.00</span>
                <span>$${remaining} restantes</span>
            </div>
            <div class="progress" style="height:6px;border-radius:50px;">
                <div class="progress-bar bg-success" role="progressbar" style="width:${pct}%"></div>
            </div>`;
    }

    // ── Check if cart is empty and show empty state ──────────
    function checkEmpty(itemCount) {
        const tbody = document.getElementById('cart-tbody');
        if (itemCount === 0 && !document.getElementById('empty-row')) {
            tbody.innerHTML = `
                <tr id="empty-row">
                    <td colspan="6">
                        <div class="empty-cart">
                            <i class="fas fa-shopping-cart"></i>
                            <p class="h5 mt-2">Tu carrito está vacío</p>
                            <a href="{{ route('shop') }}" class="btn btn-primary rounded-pill px-4 mt-3">
                                <i class="fas fa-store me-2"></i>Ir a la tienda
                            </a>
                        </div>
                    </td>
                </tr>`;

            // Disable checkout
            const btn = document.getElementById('checkout-btn');
            if (btn) { btn.classList.add('disabled'); btn.setAttribute('aria-disabled', 'true'); }
        }
    }

    // ── AJAX call helper ─────────────────────────────────────
    async function postJSON(url, body) {
        const res = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type':  'application/json',
                'Accept':        'application/json',
                'X-CSRF-TOKEN':  CSRF,
            },
            body: JSON.stringify(body),
        });
        if (!res.ok) throw new Error(`HTTP ${res.status}`);
        return res.json();
    }

    // ── Update qty (+ or – buttons, or direct input) ─────────
    async function updateQty(productId, newQty) {
        const row = document.getElementById(`row-${productId}`);
        if (!row) return;
        setRowLoading(row, true);

        try {
            const data = await postJSON(URL_UPDATE, { product_id: productId, qty: newQty });

            if (newQty <= 0) {
                row.remove();
            } else {
                document.getElementById(`qty-${productId}`).value       = newQty;
                document.getElementById(`line-${productId}`).textContent = fmt(data.line_total);
            }

            applyTotals(data);
            checkEmpty(data.item_count);
            showToast(newQty <= 0 ? '🗑️ Producto eliminado' : '✅ Cantidad actualizada');
        } catch (e) {
            showToast('❌ Error al actualizar. Intenta de nuevo.', 'danger');
            console.error(e);
        } finally {
            if (row.parentNode) setRowLoading(row, false);
        }
    }

    // ── Remove item ──────────────────────────────────────────
    async function removeItem(productId) {
        const row = document.getElementById(`row-${productId}`);
        if (!row) return;
        setRowLoading(row, true);

        try {
            const data = await postJSON(URL_REMOVE, { product_id: productId });
            row.remove();
            applyTotals(data);
            checkEmpty(data.item_count);
            showToast('🗑️ Producto eliminado del carrito');
        } catch (e) {
            showToast('❌ Error al eliminar. Intenta de nuevo.', 'danger');
            console.error(e);
            setRowLoading(row, false);
        }
    }

    // ── Event delegation on tbody ────────────────────────────
    document.getElementById('cart-tbody').addEventListener('click', function (e) {
        // MINUS — mínimo 1; usa el ✕ para eliminar
        const minusBtn = e.target.closest('.btn-minus');
        if (minusBtn) {
            const id  = parseInt(minusBtn.dataset.id);
            const inp = document.getElementById(`qty-${id}`);
            const qty = Math.max(1, parseInt(inp.value) - 1);
            updateQty(id, qty);
            return;
        }

        // PLUS
        const plusBtn = e.target.closest('.btn-plus');
        if (plusBtn) {
            const id  = parseInt(plusBtn.dataset.id);
            const inp = document.getElementById(`qty-${id}`);
            const qty = parseInt(inp.value) + 1;
            updateQty(id, qty);
            return;
        }

        // REMOVE
        const removeBtn = e.target.closest('.btn-remove-item');
        if (removeBtn) {
            const id = parseInt(removeBtn.dataset.id);
            removeItem(id);
            return;
        }
    });

    // ── Allow typing directly into qty input ─────────────────
    document.getElementById('cart-tbody').addEventListener('change', function (e) {
        if (!e.target.classList.contains('qty-input')) return;
        const row = e.target.closest('tr[data-product-id]');
        if (!row) return;
        const id  = parseInt(row.dataset.productId);
        // Enforce minimum of 1 when typing; use ✕ to remove
        const qty = Math.max(1, parseInt(e.target.value) || 1);
        e.target.value = qty;  // correct the input visually if user typed 0 or negative
        updateQty(id, qty);
    });

    // ── Coupon (UI only – mock feedback) ─────────────────────
    document.getElementById('apply-coupon').addEventListener('click', function () {
        const code = document.getElementById('coupon-input').value.trim();
        if (!code) { showToast('⚠️ Ingresa un código de cupón', 'danger'); return; }
        showToast('⚠️ Cupón "' + code + '" no válido', 'danger');
    });

})();
</script>
@endpush
