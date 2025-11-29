<x-layoutAdmin>

<style>
    /* FIX HEADER DASHBOARD TURUN */
    .page-title-box {
        margin-top: 0 !important;
    }
</style>

<div class="page-content">

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>DASHBOARD</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">GadgetZone</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>

                <div class="col-sm-6"></div>

            </div>
        </div>
    </div>

    <!-- END HEADER -->


    <!-- MULAI KONTEN (TIDAK ADA WRAPPER LAIN) -->
    <div class="container-fluid">

        {{-- Summary --}}
        <div class="row">

            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="font-size-16">Total Pendapatan</p>
                        <h3>Rp {{ number_format($totalPendapatan) }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="font-size-16">Total Order</p>
                        <h3>{{ $totalOrder }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="font-size-16">Produk Terjual</p>
                        <h3>{{ $totalProdukTerjual }}</h3>
                    </div>
                </div>
            </div>

        </div>

        {{-- Produk Info --}}
        <div class="row mt-4">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Produk Utama</h4>

                        <ul class="list-group">

                            <li class="list-group-item">
                                <strong>Produk Termahal:</strong><br>
                                {{ $produkTermahal->nama ?? '-' }} <br>
                                Harga: Rp {{ number_format($produkTermahal->harga ?? 0) }}
                            </li>

                            <li class="list-group-item">
                                <strong>Stok Terbanyak:</strong><br>
                                {{ $stokTerbanyak->nama ?? '-' }} <br>
                                Stok: {{ $stokTerbanyak->stok ?? 0 }}
                            </li>

                            <li class="list-group-item">
                                <strong>Stok Terendah:</strong><br>
                                {{ $stokTerendah->nama ?? '-' }} <br>
                                Stok: {{ $stokTerendah->stok ?? 0 }}
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</x-layoutAdmin>
