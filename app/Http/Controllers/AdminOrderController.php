<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required'
        ]);

        $order = Order::findOrFail($id);

        // FIX: gunakan kolom yang benar dari database → "status"
        $order->status = $request->payment_status;
        $order->save();

        return back()->with('success', 'Status pembayaran berhasil diperbarui!');
    }
}
