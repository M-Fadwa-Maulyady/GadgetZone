<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminLaporanController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'produk'])
            ->latest()
            ->get();

        return view('admin.laporan.index', compact('orders'));
    }
}
