$(document).ready(function() {
    $(document).on('click', '#delete_comment', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var button = $(this);
        Swal.fire({
            title: 'Kamu yakin?',
            text: "Kamu tidak akan bisa mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Terhapus!',
                    'Komentar kamu telah berhasil dihapus!',
                    'success'
                ).then(() => {
                    button.closest('form')
                        .submit();
                });
            }
        });
    });
});