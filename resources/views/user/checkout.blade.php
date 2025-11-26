<x-layoutUser>

<section style="padding:40px;">
    <h2 style="margin-bottom:20px;">Checkout</h2>

    @if ($cart && count($cart) > 0)

        <!-- FORM INFORMASI PEMBELI -->
        <form action="{{ route('user.checkout.process') }}" method="POST" style="display:flex; gap:30px; flex-wrap:wrap;">
            @csrf

            <div style="flex:1; min-width:300px;">
                <h4>Informasi Pembeli</h4>

                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>

                <label style="margin-top:15px;">No HP / WhatsApp</label>
                <input type="text" name="phone" class="form-control" required>

                <label style="margin-top:15px;">Alamat Pengiriman</label>
                <textarea name="shipping_address" class="form-control" required></textarea>

                <label style="margin-top:15px;">Metode Pembayaran</label>
                <select name="payment_method" class="form-control" required>
                    <option value="COD">COD (Bayar di tempat)</option>
                    <option value="Transfer">Transfer Bank</option>
                    <option value="QRIS">QRIS</option>
                </select>
            </div>

            <!-- RINGKASAN PRODUK -->
            <div style="flex:1; min-width:300px;">
                <h4>Ringkasan Pesanan</h4>

                <table style="width:100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background:#f3f6ff;">
                            <th style="padding:8px; border:1px solid #ddd;">Produk</th>
                            <th style="padding:8px; border:1px solid #ddd;">Qty</th>
                            <th style="padding:8px; border:1px solid #ddd;">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                        <tr>
                            <td style="padding:8px; border:1px solid #ddd;">{{ $item['name'] }}</td>
                            <td style="padding:8px; border:1px solid #ddd;">{{ $item['qty'] }}</td>
                            <td style="padding:8px; border:1px solid #ddd;">
                                Rp {{ number_format($item['price'] * $item['qty'],0,',','.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <h3 style="margin-top:20px;">
                    Total:
                    <strong style="color:#007bff;">
                        Rp {{ number_format($totalPrice,0,',','.') }}
                    </strong>
                </h3>

                <input type="hidden" name="total_price" value="{{ $totalPrice }}">

                <button type="submit"
                    style="margin-top:20px; background:#28a745; color:white; padding:12px;
                    border:none; width:100%; border-radius:6px; font-size:16px; cursor:pointer;">
                    ✔ Konfirmasi Pesanan
                </button>
            </div>
        </form>

    @else

        <p style="text-align:center; margin-top:20px;">
            🛒 Keranjang masih kosong.
            <br><br>
            <a href="/products" style="color:#007bff; text-decoration:underline;">Belanja sekarang</a>
        </p>

    @endif
</section>

</x-layoutUser>
