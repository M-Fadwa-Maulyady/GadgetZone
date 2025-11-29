<x-layoutUser>

    {{-- === HERO SECTION === --}}
    <section class="product-hero fade-up">
        <h1>📦 Semua Produk</h1>
        <p>Temukan berbagai pilihan gadget terbaik untuk kebutuhanmu.</p>
    </section>

    {{-- === PRODUCT GRID === --}}
    <section class="product-container fade-up">

        @forelse ($products as $product)
        <div class="product-card">

            <img 
                src="{{ asset('tema/img/produk/'.$product->gambar) }}" 
                alt="{{ $product->nama }}"
            >

            <div class="product-content">
                <h3>{{ $product->nama }}</h3>

                <p class="price">Rp {{ number_format($product->harga, 0, ',', '.') }}</p>

                <a href="{{ route('user.produk_detail', $product->id) }}" class="btn-buy">
                    Detail Produk
                </a>
            </div>

        </div>
        @empty

        <p style="text-align:center;padding:20px;">Belum ada produk tersedia.</p>

        @endforelse

    </section>


    {{-- === CSS KHUSUS HALAMAN PRODUK === --}}
    <style>

    /* ============================================
       HERO SECTION
    ============================================ */
    .product-hero {
        text-align: center;
        padding: 70px 20px 40px;
        background: linear-gradient(135deg, #0099ff, #00c3ff);
        color: white;
    }
    .product-hero h1 {
        font-size: 32px;
        font-weight: 800;
    }
    .product-hero p {
        margin-top: 8px;
        font-size: 15px;
        opacity: .95;
    }


    /* ============================================
       PRODUCT CONTAINER (SAMA KONSEP DENGAN BLOG)
    ============================================ */
    .product-container {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 25px;
        padding: 20px;
    }


    /* ============================================
       CARD PRODUK
    ============================================ */
    .product-card {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 4px 14px rgba(0,0,0,0.08);
        display: flex;
        flex-direction: column;
        text-align: center;
    }

    .product-card img {
        width: 100%;
        height: 170px;
        object-fit: cover;
    }

    .product-content {
        padding: 16px 20px;
    }

    .product-content h3 {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .price {
        color: #007bff;
        font-weight: 700;
        margin-bottom: 14px;
        font-size: 15px;
    }

    .btn-buy {
        display: inline-block;
        padding: 10px 16px;
        background: #28a745;
        color: #fff;
        border-radius: 10px;
        font-size: 14px;
        transition: 0.2s;
        font-weight: 600;
    }

    .btn-buy:hover {
        background: #1f7d34;
    }

    </style>

</x-layoutUser>
