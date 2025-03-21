$(document).on("click", ".upload", function (e) {
    e.preventDefault();
    $("#up-modal").modal("show");
});
$(document).on("click", ".up", function (e) {
    e.preventDefault(); // Mencegah event bawaan

    Swal.fire({
        title: "Anda Yakin?",
        text: "Pastikan data yang diisi dan lampirkan telah sesuai dan benar karena data yang sudah dikirim tidak bisa dirubah.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ajukan Kerjasama",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            let pdfInputs = $('#up-modal input[name="offer_file"]')[0];
            let pdf = pdfInputs.files[0];
            let id = $('#up-modal input[name="media_cooperation_id"]').val();

            let formData = new FormData();
            formData.append("offer_file", pdf);

            $.ajax({
                url: "/dashboard/cooperations/upload-offer/" + id,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                },
                success: function (data) {
                    if (data.status == "true") {
                        $("#up-modal").modal("hide");
                        Swal.fire(data.title, data.description, data.icon).then(
                            () => {
                                window.location.href =
                                    "/dashboard/cooperations/propose/";
                            }
                        );
                    } else {
                        Swal.fire(data.title, data.description, data.icon);
                    }
                },
                error: function (xhr) {
                    let response = xhr.responseJSON;
                    let errorMessage =
                        response && response.description
                            ? response.description
                            : "Terjadi kesalahan, coba lagi!";

                    if (xhr.status === 422 && response.errors) {
                        let errorList = Object.values(response.errors)
                            .map((error) => error.join(" "))
                            .join("\n");
                        errorMessage = "Validasi gagal:\n" + errorList;
                    }

                    Swal.fire("Gagal", errorMessage, "error");
                },
            });
        }
    });
});

// $(document).on("click", ".eg-swal-av3", function (e) {
//     e.preventDefault();
//     let id = $(this).data("id");

//     Swal.fire({
//         title: "Anda Yakin?",
//         text: "Pastikan data yang diisi dan lampirkan telah sesuai dan benar karena data yang sudah dikirim tidak bisa dirubah.",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonText: "Ajukan Kerjasama",
//     }).then(function (result) {
//         if (result.value) {
//             $.ajax({
//                 url: "/dashboard/media-order/cooperation-proposal/" + id,
//                 method: "POST",
//                 headers: {
//                     "X-CSRF-TOKEN": csrfToken,
//                 },
//                 success: function (data) {
//                     Swal.fire(
//                         "Pengajuan Berhasil!",
//                         "Selamat data pengajuan kerjasama Anda sudah berhasil terkirim dan saat ini dalam tahap verifikasi data",
//                         "success"
//                     );
//                 },
//                 error: function (xhr, status, error) {
//                     Swal.fire(
//                         "Pengajuan Gagal!",
//                         "Terjadi kesalahan saat mengirim data pengajuan kerjasama.",
//                         "error"
//                     );
//                 },
//             });
//         }
//     });
// });
