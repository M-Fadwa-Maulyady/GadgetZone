<x-layoutUser>

    {{-- === HERO SECTION (BIRU GRADIENT) === --}}
    <section class="blog-hero fade-up">
        <h1>📰 Blog & Artikel Terbaru</h1>
        <p>Dapatkan insight dan tips terbaru seputar dunia teknologi dan gadget terkini!</p>
    </section>

    {{-- === BLOG GRID === --}}
    <section class="blog-container fade-up">

        @foreach ($blogs as $blog)
        <div class="blog-card">

            <img 
                src="/uploads/blogs/{{ $blog->thumbnail ?? 'default.jpg' }}" 
                alt="{{ $blog->title }}">

            <div class="blog-content">
                <h3>{{ $blog->title }}</h3>

                <p>{{ Str::limit($blog->excerpt, 100) }}...</p>

                <a href="{{ route('blog.detail', $blog->slug) }}" class="btn-blog">
                    Baca Selengkapnya
                </a>
            </div>

        </div>
        @endforeach

    </section>

    {{-- === PAGINATION === --}}
    <div class="pagination">
        {{ $blogs->links() }}
    </div>


    {{-- =====================================
          CSS BLOG DENGAN HERO BIRU
    ====================================== --}}
    <style>

        /* ===================================
           HERO BLOG (FULL BIRU SEPERTI PRODUK)
        ===================================== */
        .blog-hero {
            text-align: center;
            padding: 70px 20px 40px;
            background: linear-gradient(135deg, #0099ff, #00c3ff);
            color: white;
        }

        .blog-hero h1 {
            font-size: 32px;
            font-weight: 800;
        }

        .blog-hero p {
            margin-top: 8px;
            font-size: 15px;
            opacity: .95;
        }


        /* ===================================
           BLOG GRID
        ===================================== */
        .blog-container {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 25px;
            padding: 25px 20px;
        }

        .blog-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
        }

        .blog-card img {
            width: 100%;
            height: 170px;
            object-fit: cover;
        }

        .blog-content {
            padding: 16px 20px;
        }

        .blog-content h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .blog-content p {
            color: #666;
            font-size: 14px;
            margin-bottom: 14px;
            line-height: 1.45;
        }


        /* ===================================
           BUTTON BLOG
        ===================================== */
        .btn-blog {
            display: inline-block;
            padding: 10px 14px;
            background: #007bff;
            color: #fff;
            border-radius: 10px;
            font-size: 14px;
            transition: 0.2s;
        }

        .btn-blog:hover {
            background: #005ad1;
        }

    </style>

</x-layoutUser>
