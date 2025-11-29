<x-layoutAdmin title="Edit Produk">

    <!-- === BLUE NAVBAR PAGE HEADER === -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Edit Produk</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">GadgetZone</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.produk.index') }}">Catalog</a></li>
                            <li class="breadcrumb-item active">Edit Produk</li>
                        </ol>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- === END BLUE HEADER === -->


    <!-- === CONTENT AREA === -->
    <div class="page-content">
        <div class="container-fluid">

            <div class="container-produk">

                <!-- HEADER FORM -->
                <div class="form-header">
                    <h2>Edit Produk</h2>
                    <p>Perbarui informasi produk dengan benar.</p>
                </div>

                <!-- CARD FORM -->
                <div class="card-form-produk">

                    <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- CURRENT IMAGE -->
                        <div class="form-group">
                            <label>Gambar Produk Saat Ini</label>
                            <img src="{{ asset('tema/img/produk/' . $produk->gambar) }}"
                                 style="width: 120px; height:120px; object-fit:cover; border-radius:10px; margin-bottom:10px; border:1px solid #ddd;">
                        </div>

                        <!-- NEW IMAGE -->
                        <div class="form-group">
                            <label>Ganti Gambar (Opsional)</label>
                            <input type="file" name="gambar" class="input">
                        </div>

                        <!-- NAMA -->
                        <div class="form-group">
                            <label>Nama Produk <span>*</span></label>
                            <input type="text" name="nama" class="input" value="{{ $produk->nama }}">
                        </div>

                        <!-- ROW -->
                        <div class="row-2">
                            <div class="form-group">
                                <label>Harga <span>*</span></label>
                                <input type="number" name="harga" class="input" value="{{ $produk->harga }}">
                            </div>

                            <div class="form-group">
                                <label>Stok <span>*</span></label>
                                <input type="number" name="stok" class="input" value="{{ $produk->stok }}">
                            </div>
                        </div>

                        <!-- DESKRIPSI -->
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="textarea">{{ $produk->deskripsi }}</textarea>
                        </div>

                        <!-- KATEGORI -->
                        <div class="form-group">
                            <label>Kategori Produk <span>*</span></label>
                            <select name="category_id" class="input" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}"
                                        {{ $produk->category_id == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- BUTTONS -->
                        <div class="btn-row">
                            <a href="{{ route('admin.produk.index') }}" class="btn-back">Kembali</a>

                            <button type="submit" class="btn-submit">
                                <i class="fa-solid fa-save"></i> Update Produk
                            </button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>


    {{-- === CSS === --}}
    <style>
        .container-produk {
            max-width: 780px;
            margin: 20px auto;
        }

        .form-header h2 {
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .form-header p {
            color: #6b7280;
            margin-bottom: 20px;
        }

        .card-form-produk {
            background: #ffffff;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.07);
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 18px;
        }

        .form-group label span { color: red; }

        .input,
        .textarea,
        select.input {
            padding: 12px 14px;
            border-radius: 10px;
            border: 1px solid #d1d5db;
            background: #f9fafb;
            font-size: 15px;
            transition: .2s;
        }

        .input:focus,
        .textarea:focus {
            background: #fff;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px #bfdbfe;
        }

        .textarea {
            min-height: 120px;
            resize: vertical;
        }

        .row-2 {
            display: flex;
            gap: 20px;
        }

        .btn-row {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-submit {
            background: #2563eb;
            padding: 12px 18px;
            color: #fff;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-submit:hover { background: #1e40af; }

        .btn-back {
            padding: 12px 18px;
            border-radius: 10px;
            background: #6b7280;
            color: #fff;
        }

        .btn-back:hover { background: #4b5563; }
    </style>

</x-layoutAdmin>
