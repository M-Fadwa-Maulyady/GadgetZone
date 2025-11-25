<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AdminCheckoutController extends Controller
{
    public function index()
    {
        // Cart admin
        $cart = session()->get('admin_cart', []);

        // Hitung total harga
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['qty'];
        }

        return view('admin.checkout.index', compact('cart', 'totalPrice'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required',
            'payment_method'   => 'required',
        ]);

        $cart = session()->get('admin_cart');

        if (!$cart || count($cart) === 0) {
            return back()->with('error', 'Cart masih kosong');
        }

        DB::transaction(function () use ($request, $cart) {

            // Simpan order
            $order = Order::create([
                'user_id'          => auth()->id(),
                'total_price'      => $request->total_price,
                'payment_method'   => $request->payment_method,
                'shipping_address' => $request->shipping_address,
                'status'           => 'pending',
            ]);

            // Simpan item order
            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['id'],
                    'qty'        => $item['qty'],
                    'price'      => $item['price'],
                ]);

                // Kurangi stok produk
                Product::where('id', $item['id'])
                    ->decrement('stock', $item['qty']);
            }
        });

        // Hapus cart
        session()->forget('admin_cart');

        return redirect()->route('admin.orders')
            ->with('success', 'Checkout berhasil disimpan!');
    }
}
