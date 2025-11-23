<x-layoutAdmin>

    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Edit Customer</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">GadgetZone</a></li>
                            <li class="breadcrumb-item active">Edit Customer</li>
                        </ol>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('dataCustomer') }}" class="btn btn-secondary">
                            <i class="mdi mdi-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="page-content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('updateCustomer', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $customer->name) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control"
                                value="{{ old('email', $customer->email) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Alamat</label>
                            <input type="text" name="alamat" class="form-control"
                                value="{{ old('alamat', $customer->alamat) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>No. Telp</label>
                            <input type="text" name="no_telp" class="form-control"
                                value="{{ old('no_telp', $customer->no_telp) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label>Password (Kosongkan jika tidak ingin mengubah)</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('dataCustomer') }}" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </div>

</x-layoutAdmin>
