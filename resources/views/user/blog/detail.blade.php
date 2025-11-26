<x-layoutUser>

    <style>
        .blog-detail-container {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
            animation: fadeUp 0.6s ease;
        }

        .blog-detail-header {
            width: 100%;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(0,0,0,0.15);
            margin-bottom: 30px;
        }

        .blog-detail-header img {
            width: 100%;
            height: 360px;
            object-fit: cover;
        }

        .blog-detail-title {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 10px;
            text-align: center;
        }

        .blog-date {
            text-align: center;
            color: #6b7280;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .blog-content {
            font-size: 17px;
            line-height: 1.7;
            color: #333;
            padding: 5px 5px 40px;
        }

        /* Konten blog rapi */
        .blog-content p {
            margin-bottom: 18px;
        }

        /* Animasi lembut */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 576px) {
            .blog-detail-title {
                font-size: 24px;
            }
            .blog-detail-header img {
                height: 200px;
            }
        }
    </style>

    <div class="blog-detail-container">

        {{-- Hero / Thumbnail --}}
        <div class="blog-detail-header">
            <img src="/uploads/blogs/{{ $blog->thumbnail }}" alt="{{ $blog->title }}">
        </div>

        {{-- Judul --}}
        <h1 class="blog-detail-title">{{ $blog->title }}</h1>

        {{-- Tanggal --}}
        <div class="blog-date">
            Dipublikasikan pada {{ $blog->created_at->format('d M Y') }}
        </div>

        {{-- Konten --}}
        <div class="blog-content">
            {!! nl2br($blog->content) !!}
        </div>

    </div>

</x-layoutUser>
