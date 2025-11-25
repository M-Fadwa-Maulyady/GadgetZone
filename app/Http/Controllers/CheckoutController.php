<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

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
