<x-layoutAdmin title="Tambah Blog">

    <!-- === BLUE NAVBAR PAGE HEADER === -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Tambah Blog</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">GadgetZone</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Blog</a></li>
                            <li class="breadcrumb-item active">Tambah Blog</li>
                        </ol>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">
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
                    <h2>Tambah Blog Baru</h2>
                    <p>Isi informasi blog dengan lengkap sebelum menyimpan.</p>
                </div>

                <!-- CARD FORM -->
                <div class="card-form-produk">

                    <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="form-group">
                            <label>Judul Blog <span>*</span></label>
                            <input type="text" name="title" class="input" placeholder="Masukkan judul blog">
                        </div>

                        <!-- Thumbnail -->
                        <div class="form-group">
                            <label>Thumbnail (opsional)</label>
                            <input type="file" name="thumbnail" class="input">
                        </div>

                        <!-- Content -->
                        <div class="form-group">
                            <label>Isi Blog <span>*</span></label>
                            <textarea name="content" class="textarea" placeholder="Tulis isi blog..."></textarea>
                        </div>

                        <!-- BUTTON -->
                        <div class="btn-row">
                            <a href="{{ route('admin.blog.index') }}" class="btn-back">Kembali</a>
                            <button type="submit" class="btn-submit">
                                <i class="fa-solid fa-save"></i> Simpan Blog
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

        .card-form-produk {
            background: #ffffff;
            padding: 32px;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.07);
        }

        .form-group {
            margin-bottom: 18px;
            display: flex;
            flex-direction: column;
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
        }

        .input:focus, .textarea:focus {
            background: #fff;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px #bfdbfe;
        }

        .textarea {
            min-height: 150px;
            resize: vertical;
        }

        .btn-row {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-submit {
            background: #2563eb;
            color: #fff;
            padding: 12px 18px;
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
