<x-layoutUser>

<section class="hero">
    <div class="hero-content">
        <h1>🎧 Audio & Tech Gadget Deals</h1>
        <p>Temukan produk terbaik dengan harga terbaik hanya di GadgetZone!</p>
        <button class="btn-hero" onclick="scrollToProducts()">Lihat Produk</button>
    </div>
</section>

<section class="popular fade-up" id="produk-section">
    <h2 style="text-align:center;color:#007bff;">Semua Produk</h2>

    <div class="product-grid">
        @forelse($products as $product)
            <div class="product-card">

                <img 
                    src="{{ asset('tema/img/produk/'.$product->gambar) }}" 
                    alt="{{ $product->nama }}"
                >

                <h3>{{ $product->nama }}</h3>

                <p class="price">Rp {{ number_format($product->harga,0,',','.') }}</p>

                <a href="{{ route('user.produk_detail', $product->id) }}" class="btn-buy">
                    Detail Produk
                </a>
            </div>
        @empty
            <p style="text-align:center;padding:20px;">Belum ada produk tersedia.</p>
        @endforelse
    </div>
</section>

<script>
    function scrollToProducts() {
        document.getElementById("produk-section").scrollIntoView({ behavior: "smooth" });
    }
</script>

<style>
    .hero{padding:80px;text-align:center;background:#f5f7ff}
    .btn-hero{padding:10px 22px;border:none;background:#007bff;color:#fff;border-radius:20px;cursor:pointer}
    .product-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;padding:20px}
    .product-card{background:white;padding:18px;border-radius:10px;box-shadow:0 3px 10px rgba(0,0,0,.1);text-align:center}
    .product-card img{width:100%;height:160px;object-fit:cover;border-radius:8px}
    .btn-buy{display:block;width:100%;background:#28a745;color:white;padding:8px;border-radius:20px;margin-top:10px;text-decoration:none;font-weight:bold}
</style>

</x-layoutUser>
