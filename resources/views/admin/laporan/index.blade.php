<x-layoutAdmin title="Laporan">

    <!-- Header Laporan -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Laporan Transaksi</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">GadgetZone</a></li>
                            <li class="breadcrumb-item active">Laporan</li>
                        </ol>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('admin.laporan.export.pdf') }}" class="btn btn-danger me-1">
                            <i class="mdi mdi-file-pdf"></i> PDF
                        </a>
                        <a href="{{ route('admin.laporan.export.excel') }}" class="btn btn-success">
                            <i class="mdi mdi-file-excel"></i> Excel
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Customer</th>
                                <th>Produk</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->user->name }}</td>
                                    <td>{{ $order->produk->nama }}</td>
                                    <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                    <td>{{ ucfirst($order->status) }}</td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">
                                        Belum ada data transaksi
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>

</x-layoutAdmin>
