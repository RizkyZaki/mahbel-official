$(document).ready(function () {
    $(document).on("click", ".delete", function (e) {
        e.preventDefault();
        const form = $(this).closest("form");
        Swal.fire({
            title: "Apa Anda Yakin?",
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: "warning",
            showCancelButton: true,
            cancelButtonColor: "#949596",
            confirmButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });

    $(document).on("click", ".reset-pass", function (e) {
        e.preventDefault();
        const form = $(this).closest("form");

        Swal.fire({
            title: "Apa Anda Yakin?",
            text: "Kata Sandi akan di reset dan menjadi menjadi Minimal8",
            icon: "warning",
            showCancelButton: true,
            cancelButtonColor: "#949596",
            confirmButtonColor: "#d33",
            confirmButtonText: "Ya, Reset!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
