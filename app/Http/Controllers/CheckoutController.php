<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /** ==================== CART ===================== */

    // Tambahkan ke Keranjang
    public function addToCart(Request $request, $id)
    {
        $product = Produk::findOrFail($id); // FIX DI SINI

        $cart = session()->get('cart', []);

        $qty = $request->qty ?? 1;

        // Jika produk sudah ada di cart, tambah qty
        if(isset($cart[$id])) {
            $cart[$id]['qty'] += $qty;
        } else {
            $cart[$id] = [
                'id' => $product->id,
                'name' => $product->nama,
                'price' => $product->harga,
                'qty' => $qty,
                'image' => $product->gambar
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', '🛒 Produk berhasil ditambahkan ke keranjang!');
    }


    /** ==================== CHECKOUT PAGE ===================== */

    public function index()
    {
        $cart = session()->get('cart', []);

        $totalPrice = collect($cart)->sum(fn($item) => $item['price'] * $item['qty']);

        return view('user.checkout', compact('cart', 'totalPrice'));
    }


    /** ==================== PROCESS ORDER ===================== */

    public function process(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required',
            'payment_method'   => 'required',
        ]);

        $cart = session()->get('cart');

        if (!$cart || count($cart) === 0) {
            return back()->with('error', '⚠ Keranjang masih kosong.');
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

                Produk::where('id', $item['id'])->decrement('stok', $item['qty']); // FIX DI SINI
            }
        });

        // Kosongkan cart setelah checkout
        session()->forget('cart');

        return redirect()->route('user.checkout.success')->with('success', '🎉 Checkout berhasil!');
    }


    /** ==================== SUCCESS PAGE ===================== */

    public function success()
    {
        return view('user.checkout_success');
    }
}
