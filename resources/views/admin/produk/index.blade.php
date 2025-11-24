<x-layoutAdmin title="Catalog">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Data Catalog</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">GadgetZone</a></li>
                            <li class="breadcrumb-item active">Catalog</li>
                        </ol>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('dataProduk.create') }}" class="btn btn-success">
                            <i class="mdi mdi-plus me-1"></i> Tambah Produk
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="page-content">
        <div class="container-fluid">

            {{-- ALERT SUCCESS --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif


            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-centered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th style="width:130px;">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($produk as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <img src="{{ asset('tema/img/produk/' . $item->gambar) }}"
                                             class="img-thumbnail"
                                             style="width:60px; height:60px; object-fit:cover;">
                                    </td>

                                    <td>{{ $item->nama }}</td>
                                    <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                                    <td>{{ $item->stok }}</td>

                                    <td>
                                        <div class="d-flex gap-2">

                                            {{-- EDIT --}}
                                            <a href="{{ route('dataProduk.edit', $item->id) }}"
                                               class="btn btn-sm btn-success">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>

                                            {{-- DELETE --}}
                                            <form action="{{ route('dataProduk.delete', $item->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin hapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                            </form>

                                            {{-- DETAIL (BLM ADA ROUTE) --}}
                                            {{-- 
                                            <a href="{{ route('dataProduk.detail', $item->id) }}"
                                               class="btn btn-sm btn-primary">
                                                <i class="mdi mdi-eye"></i>
                                            </a>
                                            --}}
                                        </div>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>


        </div>
    </div>

</x-layoutAdmin>
