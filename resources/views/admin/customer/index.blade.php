<x-layoutAdmin>

        <!-- start page title -->
        <div class="page-title-box">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="page-title">
                            <h4>Customers</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">GadgetZone</a></li>
                                <li class="breadcrumb-item active">Customers</li>
                            </ol>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="float-end d-none d-sm-block">
                            <a href="{{ route('createCustomer') }}" class="btn btn-success">
                                <i class="mdi mdi-plus me-2"></i> Add Customer
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">

                            <div>
                                <a href="{{ route('createCustomer') }}" class="btn btn-success mb-2">
                                    <i class="mdi mdi-plus me-2"></i> Tambah Customer
                                </a>
                            </div>

                            <div class="table-responsive mt-3">
                                <table class="table table-centered datatable dt-responsive nowrap" style="width: 100%;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>No. Telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($customer as $c)
                                        <tr>
                                            <td>{{ $c->name }}</td>
                                            <td>{{ $c->email }}</td>
                                            <td>{{ $c->alamat }}</td>
                                            <td>{{ $c->no_telp }}</td>

                                            <td id="tooltip-container-{{ $c->id }}">
                                                <a href="{{ route('editCustomer', $c->id) }}"
                                                   class="me-3 text-primary"
                                                   data-bs-toggle="tooltip"
                                                   title="Edit">
                                                    <i class="mdi mdi-pencil font-size-18"></i>
                                                </a>

                                                <form action="{{ route('deleteCustomer', $c->id) }}"
                                                      method="POST"
                                                      style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-danger btn btn-link p-0"
                                                            onclick="return confirm('Hapus customer ini?')"
                                                            data-bs-toggle="tooltip"
                                                            title="Delete">
                                                        <i class="mdi mdi-trash-can font-size-18"></i>
                                                    </button>
                                                </form>
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

        </div>

    </div>

</x-layoutAdmin>
