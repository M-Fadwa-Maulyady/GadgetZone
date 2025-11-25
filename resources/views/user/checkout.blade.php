<x-layoutUser>
    <section class="checkout-page" style="padding: 40px 0;">
        <div class="container">
            <h1 style="margin-bottom: 24px;">Checkout</h1>

            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 16px;">
                    <ul style="margin: 0; padding-left: 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('user.checkout.store') }}" method="POST">
                @csrf

                <div class="card" style="max-width: 600px; margin: 0 auto;">
                    <div class="card-body">

                        <h4 class="mb-3">Data Pemesan</h4>

                        <div class="mb-3">
                            <label for="billing_name" class="form-label">Nama Lengkap</label>
                            <input
                                type="text"
                                id="billing_name"
                                name="billing_name"
                                class="form-control"
                                value="{{ old('billing_name') }}"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="billing_email" class="form-label">Email</label>
                            <input
                                type="email"
                                id="billing_email"
                                name="billing_email"
                                class="form-control"
                                value="{{ old('billing_email') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="billing_phone" class="form-label">No. HP / WhatsApp</label>
                            <input
                                type="text"
                                id="billing_phone"
                                name="billing_phone"
                                class="form-control"
                                value="{{ old('billing_phone') }}"
                            >
                        </div>

                        <div class="mb-3">
                            <label for="total_price" class="form-label">Total Harga (Rp)</label>
                            <input
                                type="number"
                                id="total_price"
                                name="total_price"
                                class="form-control"
                                min="0"
                                value="{{ old('total_price', $total) }}"
                                required
                            >
                            <small class="text-muted">
                                Nanti bisa diisi otomatis dari keranjang / produk.
                            </small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3">
                            Buat Pesanan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-layoutUser>
