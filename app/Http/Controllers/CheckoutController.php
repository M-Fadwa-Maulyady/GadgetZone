<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['qty'];
        }

        return view('user.checkout.index', compact('cart', 'totalPrice'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required',
            'payment_method'   => 'required',
        ]);

        $cart = session()->get('cart');

        if (!$cart || count($cart) === 0) {
            return back()->with('error', 'Keranjang masih kosong');
        }

        DB::transaction(function () use ($request, $cart) {

            $order = Order::create([
                'user_id'          => auth()->id(),
                'total_price'      => $request->total_price,
                'payment_method'   => $request->payment_method,
                'shipping_address' => $request->shipping_address,
                'status'           => 'pending',
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['id'],
                    'qty'        => $item['qty'],
                    'price'      => $item['price'],
                ]);

                Product::where('id', $item['id'])
                    ->decrement('stock', $item['qty']);
            }
        });

        session()->forget('cart');

        return redirect()->route('user.orders')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function success() {
    return view('user.checkout.success');
}


class CheckoutController extends Controller
{
    // Halaman form checkout
    public function index(Request $request)
    {
        // total bisa dikirim via query string ?total=100000
        $total = $request->query('total', 0);

        return view('user.checkout', [
            'total' => $total,
        ]);
    }

    // Simpan order ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'billing_name'  => 'required|string|max:255',
            'billing_email' => 'nullable|email',
            'billing_phone' => 'nullable|string|max:20',
            'total_price'   => 'required|integer|min:0',
        ]);

        $order = Order::create([
            'billing_name'   => $validated['billing_name'],
            'billing_email'  => $validated['billing_email'] ?? null,
            'billing_phone'  => $validated['billing_phone'] ?? null,
            'total_price'    => $validated['total_price'],
            'payment_status' => 'pending', // sesuai field di migration
        ]);

        return redirect()
            ->route('user.checkout.success')
            ->with('success', 'Pesanan berhasil dibuat! ID Pesanan #' . $order->id);
    }

    // Halaman sukses checkout
    public function success()
    {
        return view('user.checkout_success');
    }
}
