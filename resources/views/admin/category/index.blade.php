<x-layoutAdmin>

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Manajemen Category</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">GadgetZone</a></li>
                            <li class="breadcrumb-item active">Category</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </div>
<div class="container">

    <h4 class="mb-3">Manajemen Kategori</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div style="display:flex; gap:10px;">
            <input type="text" name="nama" placeholder="Nama kategori" class="form-control">

            <input type="file" name="icon" class="form-control" accept="image/*">

            <button class="btn btn-primary">Tambah</button>
        </div>
    </form>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @foreach($categories as $cat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cat->nama }}</td>
                <td>
                    @if($cat->icon)
                        <img src="{{ asset('uploads/categories/' . $cat->icon) }}" 
                            style="width:40px; height:40px; object-fit:cover; border-radius:6px;">
                    @else
                        <span>-</span>
                    @endif
                </td>

                <td>
                    <form action="{{ route('admin.category.delete', $cat->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

</x-layoutAdmin>
