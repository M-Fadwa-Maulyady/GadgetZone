<x-layoutUser>

@if(session('success'))
    <div style="
        background:#d4edda;
        color:#155724;
        padding:12px;
        border-radius:8px;
        margin: 20px auto;
        max-width:1100px;
        text-align:center;
        font-weight:600;
    ">
        {{ session('success') }}
    </div>
@endif

<section style="padding:50px 20px;">

    {{-- ================================
         WRAPPER DETAIL PRODUK
    ================================= --}}
    <div style="
        max-width:1100px;
        margin:0 auto;
        display:flex;
        gap:40px;
        flex-wrap:wrap;
        align-items:flex-start;
        background:#fff;
        padding:25px;
        border-radius:20px;
        box-shadow:0 4px 16px rgba(0,0,0,0.06);
    ">

        {{-- GAMBAR PRODUK --}}
        <img 
            src="{{ asset('tema/img/produk/' . $produk->gambar) }}" 
            alt="{{ $produk->nama }}"
            style="
                flex:1;
                max-width:420px;
                width:100%;
                border-radius:16px;
                object-fit:cover;
                box-shadow:0 4px 12px rgba(0,0,0,0.08);
            "
        >


        {{-- INFO PRODUK --}}
        <div style="flex:1; min-width:320px;">

            <h2 style="margin-bottom:6px; font-size:28px; font-weight:800;">
                {{ $produk->nama }}
            </h2>

            <p style="color:#666; margin-bottom:20px; font-size:15px;">
                Brand: <strong>GadgetZone</strong>
            </p>

            <h3 style="
                color:#007bff;
                font-size:32px;
                font-weight:700;
                margin-bottom:20px;
            ">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </h3>

            <p style="margin-bottom:15px; font-size:16px;">
                <strong>Stok:</strong> 
                {{ $produk->stok > 0 ? $produk->stok . ' tersedia' : 'Habis' }}
            </p>


            {{-- FORM TAMBAH KERANJANG --}}
            <form action="{{ route('cart.add', $produk->id) }}" method="POST" style="margin-bottom:15px;">
                @csrf

                <label for="qty" style="font-weight:600;">Jumlah</label>

                <input 
                    type="number" 
                    name="qty" 
                    min="1" 
                    max="{{ $produk->stok }}" 
                    value="1"
                    style="
                        width:90px;
                        padding:8px;
                        border-radius:8px;
                        border:1px solid #ccc;
                        margin:8px 0 18px;
                        font-size:15px;
                    "
                >

                <button 
                    class="add-to-cart"
                    style="
                        background:#007bff;
                        color:white;
                        padding:14px;
                        border:none;
                        border-radius:10px;
                        width:100%;
                        cursor:pointer;
                        font-size:16px;
                        font-weight:600;
                        transition:.2s;
                    "
                >
                    🛒 Tambah ke Keranjang
                </button>
            </form>

            <p style="color:#1f7d34; font-size:15px; margin-top:10px;">
                🚚 Gratis Ongkir untuk pesanan di atas Rp 500.000
            </p>
        </div>
    </div>


    {{-- ================================
         DESKRIPSI PRODUK
    ================================= --}}
    <div style="max-width:1100px; margin:40px auto 0; background:#fff; padding:25px; border-radius:16px; box-shadow:0 4px 16px rgba(0,0,0,0.06);">
        <h3 style="font-size:22px; font-weight:700; margin-bottom:12px;">Deskripsi Produk</h3>

        <p style="line-height:1.7; font-size:15px; color:#444;">
            {!! nl2br(e($produk->deskripsi)) !!}
        </p>
    </div>

</section>

</x-layoutUser>
