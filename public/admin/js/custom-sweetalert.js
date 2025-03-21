"use strict";

(function (NioApp, $) {
  'use strict'; // Basic Sweet Alerts
  $('.eg-swal-av3').on("click", function (e) {
    Swal.fire({
      title: 'Anda Yakin?',
      text: "Pastikan data yang diisi dan lampirkan telah sesuai dan benar karena data yang sudah dikirim tidak bisa dirubah.",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ajukan Kerjasama'
    }).then(function (result) {
      if (result.value) {
        Swal.fire('Pengajuan Berhasil!', 'Selamat data pengajuan kerjasama Anda sudah berhasil terkirim dan saat ini dalam tahap verifikasi data', 'success');
      }
    });
    e.preventDefault();
  });
})(NioApp, jQuery);
