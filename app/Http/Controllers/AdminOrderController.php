<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Tampilkan daftar order (order.index)
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Tampilkan detail order (order.show)
     */
    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.order.show', compact('order'));
    }

    /**
     * Update payment_status (Pending → Paid → Unpaid → Canceled)
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status' => 'required'
        ]);

        $order = Order::findOrFail($id);
        $order->payment_status = $request->payment_status;
        $order->save();

        return back()->with('success', 'Payment status updated successfully.');
    }
}
