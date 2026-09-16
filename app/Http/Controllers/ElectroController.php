<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ElectroController extends Controller
{
    /**
     * Mock product catalog for the cart demo.
     */
    private function mockProducts(): array
    {
        return [
            1 => [
                'id'    => 1,
                'name'  => 'iPhone 15 Pro',
                'model' => 'A3293',
                'price' => 999.99,
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w=80&h=80&fit=crop',
            ],
            2 => [
                'id'    => 2,
                'name'  => 'Samsung Galaxy S24',
                'model' => 'SM-S926',
                'price' => 749.99,
                'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=80&h=80&fit=crop',
            ],
            3 => [
                'id'    => 3,
                'name'  => 'Apple Watch Series 9',
                'model' => 'MR983LL',
                'price' => 399.99,
                'image' => 'https://images.unsplash.com/photo-1551816230-ef5deaed4a26?w=80&h=80&fit=crop',
            ],
        ];
    }

    /**
     * Initialize the cart session with mock data if empty.
     */
    private function initCart(): void
    {
        if (!session()->has('cart')) {
            session(['cart' => [
                1 => ['product_id' => 1, 'qty' => 1],
                2 => ['product_id' => 2, 'qty' => 1],
                3 => ['product_id' => 3, 'qty' => 1],
            ]]);
        }
    }

    /**
     * Calculate cart totals and return enriched items array.
     */
    private function calcCart(): array
    {
        $products  = $this->mockProducts();
        $cartRaw   = session('cart', []);
        $items     = [];
        $subtotal  = 0;

        foreach ($cartRaw as $productId => $row) {
            $product = $products[$productId] ?? null;
            if (!$product) continue;

            $lineTotal  = $product['price'] * $row['qty'];
            $subtotal  += $lineTotal;

            $items[] = [
                'id'         => $productId,
                'name'       => $product['name'],
                'model'      => $product['model'],
                'price'      => $product['price'],
                'qty'        => $row['qty'],
                'line_total' => $lineTotal,
                'image'      => $product['image'],
            ];
        }

        // Dynamic shipping logic
        if ($subtotal === 0.0) {
            $shipping     = 0.00;
            $shippingLabel = '$0.00';
        } elseif ($subtotal < 100) {
            $shipping     = 15.00;
            $shippingLabel = '$15.00';
        } elseif ($subtotal < 500) {
            $shipping     = 9.99;
            $shippingLabel = '$9.99';
        } else {
            $shipping     = 0.00;
            $shippingLabel = 'Gratis 🎉';
        }

        $total = $subtotal + $shipping;

        return compact('items', 'subtotal', 'shipping', 'shippingLabel', 'total');
    }

    // ─────────────────────────────────────────────────────────────
    // Public page methods
    // ─────────────────────────────────────────────────────────────

    /**
     * Display the Landing / Home page.
     */
    public function index()
    {
        return view('pages.home');
    }

    /**
     * Display the Shop page.
     */
    public function shop()
    {
        return view('pages.shop');
    }

    /**
     * Display the Single Product Detail page.
     */
    public function single()
    {
        return view('pages.single');
    }

    /**
     * Display the Shopping Cart page.
     */
    public function cart()
    {
        $this->initCart();
        $data = $this->calcCart();

        return view('pages.cart', $data);
    }

    /**
     * Update a product quantity in the cart (AJAX POST).
     * Expects: product_id (int), qty (int >= 0)
     */
    public function updateCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'qty'        => 'required|integer|min:0',
        ]);

        $productId = (int) $request->product_id;
        $qty       = (int) $request->qty;
        $products  = $this->mockProducts();

        if (!isset($products[$productId])) {
            return response()->json(['error' => 'Producto no encontrado'], 404);
        }

        $cart = session('cart', []);

        if ($qty <= 0) {
            unset($cart[$productId]);
        } else {
            $cart[$productId] = ['product_id' => $productId, 'qty' => $qty];
        }

        session(['cart' => $cart]);

        $data = $this->calcCart();

        return response()->json([
            'success'       => true,
            'product_id'    => $productId,
            'qty'           => $qty,
            'line_total'    => $qty > 0 ? round($products[$productId]['price'] * $qty, 2) : 0,
            'subtotal'      => round($data['subtotal'], 2),
            'shipping'      => round($data['shipping'], 2),
            'shippingLabel' => $data['shippingLabel'],
            'total'         => round($data['total'], 2),
            'item_count'    => count($data['items']),
        ]);
    }

    /**
     * Remove a product from the cart (AJAX POST).
     * Expects: product_id (int)
     */
    public function removeFromCart(Request $request)
    {
        $request->validate(['product_id' => 'required|integer']);

        $productId = (int) $request->product_id;
        $cart      = session('cart', []);

        unset($cart[$productId]);
        session(['cart' => $cart]);

        $data = $this->calcCart();

        return response()->json([
            'success'       => true,
            'product_id'    => $productId,
            'subtotal'      => round($data['subtotal'], 2),
            'shipping'      => round($data['shipping'], 2),
            'shippingLabel' => $data['shippingLabel'],
            'total'         => round($data['total'], 2),
            'item_count'    => count($data['items']),
        ]);
    }

    /**
     * Display the Checkout page.
     */
    public function checkout()
    {
        return view('pages.checkout');
    }

    /**
     * Display the Bestsellers page.
     */
    public function bestseller()
    {
        return view('pages.bestseller');
    }

    /**
     * Display the Contact Us page.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Display the 404 page.
     */
    public function notfound()
    {
        return view('pages.404');
    }
}
