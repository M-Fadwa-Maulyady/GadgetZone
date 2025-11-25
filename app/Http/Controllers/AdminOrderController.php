<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->get();
        return view('admin.order.index', compact('orders'));
    }

    // DETAIL ORDER (SHOW)
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.order.show', compact('order'));
    }

    // UPDATE STATUS ORDER
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->payment_status = $request->payment_status;
        $order->save();

        return back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }

    // Simpan order baru (misalnya dari checkout)
    public function store(Request $request)
    {
        Order::create([
            'billing_name'   => $request->billing_name,
            'billing_email'  => $request->billing_email,
            'billing_phone'  => $request->billing_phone,
            'total_price'    => $request->total_price,
            'payment_status' => 'pending'
        ]);

        return redirect()->route('admin.orders')->with('success', 'Order berhasil dibuat.');
    }
}
