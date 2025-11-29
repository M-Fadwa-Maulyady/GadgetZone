<x-layoutUser>

<section style="padding:50px 20px;">

    <h2 style="margin-bottom:25px;font-size:30px;font-weight:800;text-align:center;">
        Checkout
    </h2>

    @if ($cart && count($cart) > 0)

    <form action="{{ route('user.checkout.process') }}" method="POST"
        style="max-width:1100px;margin:0 auto;display:flex;gap:35px;flex-wrap:wrap;">
        @csrf

        <!-- ============================================================
             FORM INFORMASI PEMBELI (RAPI BANGET)
        =============================================================== -->
        <div style="
            flex:1;min-width:320px;background:#fff;padding:30px;border-radius:20px;
            box-shadow:0 4px 16px rgba(0,0,0,0.06);
        ">

            <h3 style="font-size:20px;font-weight:700;margin-bottom:25px;">
                Informasi Pembeli
            </h3>

            <!-- 2 Kolom Nama + No HP -->
            <div style="display:flex;gap:15px;margin-bottom:18px;">
                
                <div style="flex:1;">
                    <label style="font-weight:600;">Nama Lengkap</label>
                    <input type="text" name="name"
                        value="{{ auth()->user()->name }}"
                        required
                        style="width:100%;padding:10px;border-radius:10px;border:1px solid #ccc;margin-top:6px;">
                </div>

                <div style="flex:1;">
                    <label style="font-weight:600;">No HP / WhatsApp</label>
                    <input type="text" name="phone"
                        required
                        style="width:100%;padding:10px;border-radius:10px;border:1px solid #ccc;margin-top:6px;">
                </div>

            </div>

            <!-- Alamat -->
            <label style="font-weight:600;">Alamat Pengiriman</label>
            <textarea name="shipping_address" required
                style="width:100%;padding:10px;border-radius:10px;border:1px solid #ccc;margin:6px 0 18px;height:110px;"></textarea>

            <!-- Pembayaran -->
            <label style="font-weight:600;">Metode Pembayaran</label>
            <select name="payment_method" required
                style="width:100%;padding:10px;border-radius:10px;border:1px solid #ccc;margin-top:6px;">
                <option value="COD">COD (Bayar di tempat)</option>
                <option value="Transfer">Transfer Bank</option>
                <option value="QRIS">QRIS</option>
            </select>

        </div>


        <!-- ============================================================
             RINGKASAN PESANAN
        =============================================================== -->
        <div style="
            flex:1;min-width:320px;background:#fff;padding:30px;border-radius:20px;
            box-shadow:0 4px 16px rgba(0,0,0,0.06);
        ">

            <h3 style="font-size:20px;font-weight:700;margin-bottom:20px;">
                Ringkasan Pesanan
            </h3>

            <table style="width:100%;border-collapse:collapse;font-size:15px;">
                <thead>
                    <tr style="background:#f1f5ff;">
                        <th style="padding:10px;border:1px solid #e1e1e1;">Produk</th>
                        <th style="padding:10px;border:1px solid #e1e1e1;">Qty</th>
                        <th style="padding:10px;border:1px solid #e1e1e1;">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td style="padding:10px;border:1px solid #e1e1e1;">{{ $item['name'] }}</td>
                        <td style="padding:10px;border:1px solid #e1e1e1;text-align:center;">{{ $item['qty'] }}</td>
                        <td style="padding:10px;border:1px solid #e1e1e1;">
                            Rp {{ number_format($item['price'] * $item['qty'], 0, ',', '.') }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <h3 style="margin-top:25px;font-size:22px;">
                Total:
                <strong style="color:#007bff;">
                    Rp {{ number_format($totalPrice,0,',','.') }}
                </strong>
            </h3>

            <input type="hidden" name="total_price" value="{{ $totalPrice }}">

            <button type="submit"
                style="
                    margin-top:20px;background:#28a745;color:white;padding:14px;
                    border:none;width:100%;border-radius:10px;font-size:16px;font-weight:700;
                    cursor:pointer;transition:.2s;
                ">
                ✔ Konfirmasi Pesanan
            </button>

        </div>

    </form>


    @else
    <p style="text-align:center;margin-top:40px;font-size:18px;">
        🛒 Keranjang masih kosong.<br><br>
        <a href="/products" style="color:#007bff;text-decoration:underline;">Belanja sekarang</a>
    </p>
    @endif

</section>

</x-layoutUser>
