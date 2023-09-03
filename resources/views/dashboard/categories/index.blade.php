@extends('dashboard.layouts.main')

@push('swal_delete')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete_category', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var button = $(this);
                Swal.fire({
                    title: 'Kamu yakin?',
                    text: "Kamu akan menghapus kategori yang dipilih",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Tidak',
                    confirmButtonText: 'Ya',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Terhapus!',
                            'Kategori berhasil dihapus!',
                            'success'
                        ).then(() => {
                            button.closest('form')
                                .submit();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Dibatalkan',
                            'Kategori tidak jadi dihapus :)',
                            'error'
                        )
                    }
                });
            });
        });
    </script>
@endpush

@section('container')
    <main id="main" class="main pt-1">
        <div
            class="d-flex justify-content-between align-items-start align-items-sm-center flex-column flex-sm-row mb-3 mb-sm-0">
            <div class="pagetitle mb-0 mt-4">
                <h1>Kategori</h1>
                {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.categories') }}
            </div><!-- End Page Title -->

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
                <i class="bi bi-plus-square me-2"></i><span class="text">Buat kategori</span>
            </button>

            <!-- Create category modal -->
            <div class="modal fade" id="createCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Buat kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Create category Form -->
                        <form action="{{ route('categories.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3 form-floating">
                                    <input type="text" class="name form-control @error('name') is-invalid @enderror"
                                        placeholder="Nama kategori" value="{{ old('name') }}" name="name" required
                                        autofocus>
                                    <label for="name">Nama kategori</label>
                                </div>

                                <div class="mb-3 form-floating">
                                    <input type="text" class="slug form-control @error('slug') is-invalid @enderror"
                                        placeholder="Slug kategori" value="{{ old('slug') }}" name="slug" required
                                        readonly>
                                    <label for="slug">Slug kategori</label>
                                </div>
                            </div>

                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary"><i class="bi bi-plus-square me-2 "></i>
                                    Buat!</button>
                            </div>
                        </form><!-- End Create category Form -->
                    </div>
                </div>
            </div><!-- End Create category Modal-->
        </div>
        <section class="section">
            @if (session()->has('success'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0 py-1">
                            <i class="bi bi-exclamation-octagon me-1"></i>
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif

            <div class="card shadow mb-4">
                <div class="card-body pt-4">
                    <table class="table table-hover table-striped datatable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <button class="btn btn-success mr-1 mb-2 lg:mb-0" type="button"
                                            data-bs-toggle="modal" data-bs-target="#edit_category_{{ $category->id }}"><i
                                                class="bi bi-pencil-square"></i></button>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger border-0 mb-2 lg:mb-0" type="button"
                                                id="delete_category">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit category modal -->
                                <div class="modal fade" id="edit_category_{{ $category->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Kategori: {{ $category->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <!-- Update Form -->
                                            <form action="{{ route('categories.update', $category->id) }}" method="post">
                                                @method('put')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="mb-3 form-floating">
                                                        <input type="text"
                                                            class="name form-control @error('name') is-invalid @enderror"
                                                            placeholder="Nama kategori" value="{{ $category->name }}"
                                                            name="name" required autofocus>
                                                        <label for="name">Nama kategori</label>
                                                    </div>

                                                    <div class="mb-3 form-floating">
                                                        <input type="text"
                                                            class="slug form-control @error('slug') is-invalid @enderror"
                                                            placeholder="Slug kategori" value="{{ $category->slug }}"
                                                            name="slug" required>
                                                        <label for="slug">Slug kategori</label>
                                                    </div>
                                                </div>

                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="bi bi-pencil-square me-2 "></i> Edit!</button>
                                                </div>

                                            </form><!-- End Update Form -->
                                        </div>
                                    </div>
                                </div><!-- End edit category modal-->
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                scrollX: false,
                scrollCollapse: true,
                responsive: true,
            });
        });
    </script>

    <script>
        const name = document.querySelector('.name');
        const slug = document.querySelector('.slug');

        name.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endpush
