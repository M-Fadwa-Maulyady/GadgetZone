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
