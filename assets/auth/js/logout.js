$('.logout').on('click', function (e) {

    e.preventDefault();

    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin',
        text: "Ingin meninggalkan halaman ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })
});