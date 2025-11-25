<x-layoutUser>

    <!-- Hero -->
    <section class="hero">
        <div class="hero-content">
            <h1>🎧 Audio & Tech Gadget Deals</h1>
            <p>Temukan produk terbaik dengan diskon hingga <strong>30%</strong> untuk gadget pilihanmu!</p>
            <button class="btn-hero" onclick="scrollToProducts()">Shop Now</button>
        </div>
    </section>

    <!-- Kategori / Produk -->
    <section class="popular fade-up" id="produk-section">
        <h2 style="text-align:center;color: #007bff;">Kategori</h2>

        <div class="filters">
            <button class="active" data-filter="all">Semua</button>
            <button data-filter="smartphone">Smartphone</button>
            <button data-filter="tablet">Tablet</button>
            <button data-filter="camera">Camera</button>
            <button data-filter="game_console">Game Console</button>
            <button data-filter="smartwatch">Smartwatch</button>
            <button data-filter="drone">Drone</button>
            <button data-filter="audio">Audio</button>
            <button data-filter="computer">Computer</button>
        </div>

        <div class="product-grid" id="productGrid"></div>
    </section>

    <!-- Join Section -->
    <section class="join fade-up">
        <div class="join-content">
            <h2>💙 Bergabung dengan Komunitas GadgetZone</h2>
            <p>Dapatkan update produk terbaru, promo spesial, dan tips teknologi langsung ke email kamu!</p>
            <div class="join-input">
                <input type="email" placeholder="Masukkan email kamu..." />
                <button class="btn glow-btn">Gabung Sekarang</button>
            </div>
        </div>
    </section>

    {{-- ================== SCRIPT JS ================== --}}
    <script>
        // Data produk contoh (bisa nanti diganti dari database)
        const products = [
            {
                name: "iPhone 15 Pro",
                price: 18999000,
                category: "smartphone",
                image: "https://via.placeholder.com/300x200?text=iPhone+15+Pro"
            },
            {
                name: "Samsung Galaxy Tab S9",
                price: 12999000,
                category: "tablet",
                image: "https://via.placeholder.com/300x200?text=Galaxy+Tab+S9"
            },
            {
                name: "Sony WH-1000XM5",
                price: 5999000,
                category: "audio",
                image: "https://via.placeholder.com/300x200?text=Sony+XM5"
            },
            {
                name: "Canon EOS M50",
                price: 8999000,
                category: "camera",
                image: "https://via.placeholder.com/300x200?text=Canon+M50"
            },
            {
                name: "PlayStation 5",
                price: 8999000,
                category: "game_console",
                image: "https://via.placeholder.com/300x200?text=PS5"
            },
            {
                name: "Apple Watch Series 9",
                price: 7999000,
                category: "smartwatch",
                image: "https://via.placeholder.com/300x200?text=Apple+Watch+9"
            },
            {
                name: "DJI Mini 4 Pro",
                price: 13999000,
                category: "drone",
                image: "https://via.placeholder.com/300x200?text=DJI+Mini+4"
            },
            {
                name: "MacBook Air M2",
                price: 18999000,
                category: "computer",
                image: "https://via.placeholder.com/300x200?text=MacBook+Air+M2"
            },
        ];

        const productGrid = document.getElementById('productGrid');
        const filterButtons = document.querySelectorAll('.filters button');

        // Render produk ke grid
        function renderProducts(list) {
            productGrid.innerHTML = '';

            if (!list.length) {
                productGrid.innerHTML = '<p style="text-align:center;">Produk tidak ditemukan.</p>';
                return;
            }

            list.forEach(product => {
                productGrid.innerHTML += `
                    <div class="product-card">
                        <img src="${product.image}" alt="${product.name}">
                        <h3>${product.name}</h3>
                        <p class="price">Rp ${product.price.toLocaleString('id-ID')}</p>
                        <button 
                            class="btn-buy"
                            onclick="goToCheckout(${product.price}, '${product.name.replace(/'/g, "\\'")}')"
                        >
                            Checkout
                        </button>
                    </div>
                `;
            });
        }

        // Scroll ke section product
        function scrollToProducts() {
            const section = document.getElementById('produk-section');
            if (section) section.scrollIntoView({ behavior: 'smooth' });
        }

        // Filter kategori
        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.getAttribute('data-filter');

                // ubah active button
                filterButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                if (filter === 'all') {
                    renderProducts(products);
                } else {
                    const filtered = products.filter(p => p.category === filter);
                    renderProducts(filtered);
                }
            });
        });

        // Redirect ke halaman checkout Laravel
        function goToCheckout(price, name) {
            const url = `/checkout?total=${price}&product=${encodeURIComponent(name)}`;
            window.location.href = url;
        }

        // initial render
        document.addEventListener('DOMContentLoaded', () => {
            renderProducts(products);
        });
    </script>

    {{-- ================== STYLE SEDIKIT (opsional, kalau belum ada di CSS utama) ================== --}}
    <style>
        .hero {
            padding: 80px 0;
            text-align: center;
            background: #f5f7ff;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .btn-hero {
            margin-top: 16px;
            padding: 10px 24px;
            border-radius: 999px;
            border: none;
            background: #007bff;
            color: #fff;
            cursor: pointer;
            font-weight: 600;
        }

        .popular {
            padding: 60px 0;
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            margin-bottom: 24px;
        }

        .filters button {
            border: 1px solid #007bff;
            background: #fff;
            padding: 6px 16px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 0.9rem;
        }

        .filters button.active,
        .filters button:hover {
            background: #007bff;
            color: #fff;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            padding: 0 16px;
        }

        .product-card {
            background: #fff;
            border-radius: 12px;
            padding: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            text-align: center;
        }

        .product-card img {
            max-width: 100%;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        .product-card h3 {
            font-size: 1rem;
            margin-bottom: 8px;
        }

        .product-card .price {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .btn-buy {
            width: 100%;
            padding: 8px 0;
            border-radius: 999px;
            border: none;
            background: #28a745;
            color: #fff;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-buy:hover {
            opacity: 0.9;
        }

        .join {
            padding: 60px 0;
            background: #f8f9fa;
            text-align: center;
        }

        .join-input {
            margin-top: 16px;
            display: inline-flex;
            gap: 8px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .join-input input {
            padding: 8px 12px;
            min-width: 220px;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        .glow-btn {
            border-radius: 20px;
            border: none;
            padding: 8px 18px;
            background: #007bff;
            color: #fff;
            cursor: pointer;
            font-weight: 600;
        }
    </style>

</x-layoutUser>
