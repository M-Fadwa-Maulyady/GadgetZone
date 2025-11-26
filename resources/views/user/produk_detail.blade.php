<x-layoutUser>

@if(session('success'))
    <div style="background:#d4edda;color:#155724;padding:10px;border-radius:6px;margin-bottom:20px;text-align:center;">
        {{ session('success') }}
    </div>
@endif

<section style="padding:50px 0;">
    <div class="container" style="display:flex;gap:40px;flex-wrap:wrap;align-items:flex-start;">

        <!-- Gambar Produk -->
        <img 
            src="{{ asset('tema/img/produk/' . $produk->gambar) }}" 
            alt="{{ $produk->nama }}"
            style="flex:1;max-width:400px;border-radius:10px;object-fit:cover;"
        >

        <!-- Info Produk -->
        <div style="flex:1;min-width:320px;">
            <h2 style="margin-bottom:5px;">{{ $produk->nama }}</h2>
            <p style="color:gray;margin-bottom:15px;">Brand: GadgetZone</p>

            <h3 style="color:#007bff;font-size:28px;margin-bottom:20px;">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </h3>

            <p style="margin-bottom:10px;font-size:15px;">
                <strong>Stok:</strong> 
                {{ $produk->stok > 0 ? $produk->stok . ' tersedia' : 'Habis' }}
            </p>

            <!-- Form Tambah Keranjang -->
            <form action="{{ route('cart.add', $produk->id) }}" method="POST">
                @csrf
                
                <label for="qty">Jumlah</label>
                <input type="number" name="qty" min="1" max="{{ $produk->stok }}" value="1"
                       style="width:80px;padding:6px;border-radius:8px;border:1px solid #ccc;margin-bottom:15px;display:block;">

                <button 
                    class="add-to-cart"
                    style="background:#007bff;color:white;padding:12px;border:none;
                           border-radius:8px;width:100%;cursor:pointer;font-size:16px;">
                    🛒 Tambah ke Keranjang
                </button>
            </form>

            <p style="color:green;margin-top:10px;">
                🚚 Gratis Ongkir untuk pesanan di atas Rp 500.000
            </p>
        </div>
    </div>

    <!-- Deskripsi Produk -->
    <div class="container" style="margin-top:40px;">
        <h3>Deskripsi Produk</h3>
        <p style="line-height:1.6;">
            {!! nl2br(e($produk->deskripsi)) !!}
        </p>
    </div>
</section>

</x-layoutUser>
