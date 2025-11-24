<x-layoutAdmin title="Tambah Produk">

    <!-- === BLUE NAVBAR PAGE HEADER === -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Tambah Produk</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">GadgetZone</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('dataProduk.index') }}">Catalog</a></li>
                            <li class="breadcrumb-item active">Tambah Produk</li>
                        </ol>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('dataProduk.index') }}" class="btn btn-secondary">
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
                    <h2>Tambah Produk Baru</h2>
                    <p>Isi informasi produk dengan lengkap untuk menambahkannya ke katalog.</p>
                </div>

                <!-- CARD FORM -->
                <div class="card-form-produk">

                    <form action="{{ route('dataProduk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- GAMBAR -->
                        <div class="form-group">
                            <label>Gambar Produk <span>*</span></label>
                            <input type="file" name="gambar" class="input">
                        </div>

                        <!-- NAMA -->
                        <div class="form-group">
                            <label>Nama Produk <span>*</span></label>
                            <input type="text" name="nama" class="input" placeholder="Masukkan nama produk">
                        </div>

                        <!-- ROW -->
                        <div class="row-2">
                            <div class="form-group">
                                <label>Harga <span>*</span></label>
                                <input type="number" name="harga" class="input" placeholder="Masukkan harga">
                            </div>

                            <div class="form-group">
                                <label>Stok <span>*</span></label>
                                <input type="number" name="stok" class="input" placeholder="Jumlah stok">
                            </div>
                        </div>

                        <!-- DESKRIPSI -->
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="textarea" placeholder="Masukkan deskripsi produk"></textarea>
                        </div>

                        <!-- BUTTON -->
                        <div class="btn-row">
                            <a href="{{ route('dataProduk.index') }}" class="btn-back">Kembali</a>
                            <button type="submit" class="btn-submit">
                                <i class="fa-solid fa-save"></i> Simpan Produk
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>


    {{-- CSS --}}
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

        /* Card */
        .card-form-produk {
            background: #ffffff;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.07);
        }

        /* Input */
        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 18px;
        }

        .form-group label span {
            color: red;
        }

        .input, .textarea {
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

        /* Row */
        .row-2 {
            display: flex;
            gap: 20px;
        }

        /* Buttons */
        .btn-row {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
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

        .btn-submit:hover {
            background: #1e40af;
        }

        .btn-back {
            padding: 12px 18px;
            border-radius: 10px;
            background: #6b7280;
            color: #fff;
        }

        .btn-back:hover {
            background: #4b5563;
        }
    </style>

</x-layoutAdmin>
