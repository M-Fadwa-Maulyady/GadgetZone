<x-layoutUser>

<section style="padding:60px 20px;">

    <div style="
        max-width:600px; 
        margin:0 auto; 
        text-align:center;
        background:#ffffff;
        padding:40px 30px;
        border-radius:20px;
        box-shadow:0 6px 20px rgba(0,0,0,0.06);
    ">

        <!-- Judul -->
        <h1 style="font-size:32px; font-weight:800; margin-bottom:10px;">
            🎉 Checkout Berhasil
        </h1>

        <!-- Pesan sukses -->
        @if (session('success'))
            <p style="margin-top:10px; font-size:16px; color:#444;">
                {{ session('success') }}
            </p>
        @else
            <p style="margin-top:10px; font-size:16px; color:#444;">
                Pesanan kamu berhasil disimpan dan sedang diproses.
            </p>
        @endif

        <!-- Tombol kembali -->
        <a href="{{ route('productUser') }}"
            style="
                display:inline-block;
                margin-top:25px;
                padding:12px 28px;
                background:linear-gradient(135deg,#00b7ff,#7c42ff);
                color:white;
                border-radius:12px;
                font-size:16px;
                font-weight:600;
                text-decoration:none;
                box-shadow:0 4px 15px rgba(0, 123, 255, 0.28);
                transition:0.2s;
            "
            onmouseover="this.style.opacity='0.9'"
            onmouseout="this.style.opacity='1'"
        >
            ⬅ Kembali Belanja
        </a>

    </div>

</section>

</x-layoutUser>
