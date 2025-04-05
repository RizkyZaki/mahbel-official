let baseUrl = "/dashboard/contacts";
$(document).on("click", ".detail", function (e) {
    e.preventDefault();
    $("#modal-detail").modal("show");
    var id = $(this).data("id");

    $.ajax({
        url: baseUrl + "/" + id, // Ganti dengan endpoint yang sesuai
        method: "GET",
        success: function (response) {
            // Menampilkan detail data di dalam modal
            $("#detailNama").text(response.name);
            $("#detailEmail").text(response.email);
            $("#detailSubject").text(response.subject);
            $("#detailContent").text(response.description);
        },
    });
});
