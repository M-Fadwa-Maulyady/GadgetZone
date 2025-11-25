<x-layoutUser>
    <section class="checkout-page" style="padding: 40px 0;">
        <div class="container" style="max-width: 600px; margin: 0 auto;">

            <h1>Checkout Berhasil</h1>

            @if (session('success'))
                <div class="alert alert-success" style="margin-top: 16px;">
                    {{ session('success') }}
                </div>
            @else
                <p style="margin-top: 16px;">
                    Pesanan kamu sudah tersimpan di sistem.
                </p>
            @endif

            <a href="{{ route('productUser') }}" class="btn btn-primary mt-3">
                Kembali Belanja
            </a>
        </div>
    </section>
</x-layoutUser>
