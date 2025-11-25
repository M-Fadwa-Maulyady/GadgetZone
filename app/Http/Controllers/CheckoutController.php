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

}
