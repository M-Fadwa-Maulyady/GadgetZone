<x-layoutAdmin title="Manajemen Blog">

    <!-- start page title -->
    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-sm-6">
                    <div class="page-title">
                        <h4>Manajemen Blog</h4>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">GadgetZone</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="float-end d-none d-sm-block">
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                            <i class="mdi mdi-plus me-1"></i> Tambah Blog
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
                                    <th>Thumbnail</th>
                                    <th>Judul</th>
                                    <th>Excerpt</th>
                                    <th>Tanggal</th>
                                    <th style="width:150px">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($blogs as $blog)
                                    <tr>
                                        <td>
                                            @if($blog->thumbnail)
                                                <img src="/uploads/blogs/{{ $blog->thumbnail }}" 
                                                     width="70" class="img-thumbnail"
                                                     style="object-fit:cover;">
                                            @else
                                                <span class="text-muted">Tidak ada</span>
                                            @endif
                                        </td>

                                        <td>{{ $blog->title }}</td>
                                        <td>{{ Str::limit($blog->excerpt, 60) }}</td>
                                        <td>{{ $blog->created_at->format('d M Y') }}</td>

                                        <td class="d-flex gap-2">

                                            <a href="{{ route('admin.blog.edit', $blog->id) }}" 
                                               class="btn btn-warning btn-sm">
                                                <i class="mdi mdi-pencil"></i>
                                            </a>

                                            <form action="{{ route('admin.blog.delete', $blog->id) }}" 
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin hapus blog ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="mdi mdi-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            Belum ada blog
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="mt-3">
                            {{ $blogs->links() }}
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

</x-layoutAdmin>
