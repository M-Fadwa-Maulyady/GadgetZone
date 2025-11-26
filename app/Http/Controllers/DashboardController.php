<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produk;

class dashboardController extends Controller
{
    public function index()
    {
        // Total order yang masuk
        $totalOrder = Order::count();

        // Total pendapatan
        $totalPendapatan = Order::sum('total_price');

        // Total produk yang terjual (jumlah qty)
        $totalProdukTerjual = OrderItem::sum('qty');

        // Produk paling mahal
        $produkTermahal = Produk::orderBy('harga', 'desc')->first();

        // Stok terbanyak & tersedikit
        $stokTerbanyak = Produk::orderBy('stok', 'desc')->first();
        $stokTerendah  = Produk::orderBy('stok', 'asc')->first();

        return view('admin.dashboard', compact(
            'totalOrder',
            'totalPendapatan',
            'totalProdukTerjual',
            'produkTermahal',
            'stokTerbanyak',
            'stokTerendah'
        ));
    }
}
