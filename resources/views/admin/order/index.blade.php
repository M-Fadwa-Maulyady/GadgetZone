<x-layoutAdmin>

<div class="container">

    <h4 class="mb-4">Daftar Pesanan</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>ID Pesanan</th>
                <th>Tanggal</th>
                <th>Pembeli</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($orders as $order)
            <tr>
                <td><input type="checkbox"></td>

                <td><a href="{{ route('admin.orders.show', $order->id) }}" class="fw-bold">
                    #{{ $order->id }}
                </a></td>

                <td>{{ $order->created_at->format('d M Y') }}</td>

                <td>{{ $order->user->name ?? 'Unknown' }}</td>

                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>

                <td>
                    <span class="badge bg-warning">{{ ucfirst($order->status) }}</span>
                </td>

                <td>
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="text-primary">Detail</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-muted">
                    Belum ada pesanan.
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

</x-layoutAdmin>
