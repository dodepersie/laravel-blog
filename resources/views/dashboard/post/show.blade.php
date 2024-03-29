@extends('dashboard.layouts.main')

@push('swal_delete')
    <script type="text/javascript">
        $(function() {
            $(document).on('click', '#delete_post', function(e) {
                e.preventDefault();
                e.stopPropagation();
                var button = $(this);
                Swal.fire({
                    title: 'Kamu yakin?',
                    text: "Kamu akan menghapus artikel yang dipilih",
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
                            'Artikel berhasil dihapus!',
                            'success'
                        ).then(() => {
                            button.closest('form')
                                .submit();
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire(
                            'Dibatalkan',
                            'Artikel tidak jadi dihapus :)',
                            'error'
                        )
                    }
                });
            });
        });
    </script>
@endpush

@section('container')
    <main id="main" class="main pt-4">
        <div class="pagetitle">
            <h1>Melihat Artikel</h1>
            {{ Breadcrumbs::view('breadcrumbs::bootstrap5', 'dashboard.post.view', $post) }}
        </div><!-- End Page Title -->
        <section class="section">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body pt-4">

                            <div class="mb-3">
                                <a href="{{ route('posts.index') }}" class="btn btn-primary btn-icon-split mr-2">
                                    <i class="bi bi-arrow-left"></i>
                                    <span class="text d-none d-lg-inline">Kembali ke artikel saya</span>
                                </a>

                                <a href="{{ route('posts.edit', $post->slug) }}"
                                    class="btn btn-secondary btn-icon-split mr-2">
                                    <i class="bi bi-pencil-square"></i>
                                    <span class="text d-none d-lg-inline">Edit artikel</span>
                                </a>

                                <a href="{{ '/posts/' . $post->slug }}" class="btn btn-success btn-icon-split mr-2"
                                    target="_blank" ref="noreferrer">
                                    <i class="bi bi-eye"></i>
                                    <span class="text d-none d-lg-inline">Lihat di blog</span>
                                </a>

                                <form action="{{ route('posts.destroy', $post->slug) }}" method="POST" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-icon-split" id="delete_post" <i
                                        class="bi bi-trash"></i>
                                        <span class="text d-none d-lg-inline">Hapus artikel</span>
                                    </button>
                                </form>
                            </div>

                            @if ($post->image)
                                <img src="{{ asset('post_images/' . $post->image) }}" class="rounded img-fluid"
                                    alt="{{ $post->title }}">
                            @else
                                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                                    class="rounded img-fluid" alt="{{ $post->title }}">
                            @endif

                            <article class="my-3 text-justify lh-lg">
                                {!! $post->body !!}
                            </article>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
