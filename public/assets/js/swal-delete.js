$(function() {
    $(document).on('click', '#delete_comment', function(e) {
        e.preventDefault();
        e.stopPropagation();
        var button = $(this);
        Swal.fire({
            title: 'Kamu yakin?',
            text: "Kamu akan menghapus komentar yang dipilih",
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
                    'Komentar berhasil dihapus!',
                    'success'
                ).then(() => {
                    button.closest('form')
                        .submit();
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Komentar tidak jadi dihapus :)',
                    'error'
                )
            }
        });
    });
});