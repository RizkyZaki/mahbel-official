let baseUrl = "/dashboard/about";
function texteditor() {
    $("textarea.summernote").summernote({
        placeholder: "Deskripsi",
        tabsize: 2,
        height: 150,
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "italic", "underline", "clear"]],
            ["font", ["strikethrough", "superscript", "subscript"]],
            ["fontname", ["fontname"]],
            ["fontsize", ["fontsize"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["height", ["height"]],
        ],
    });
}
function createTextSlug() {
    var title = $("#title").val();
    $("#slug").val(generateSlug(title));
}

function createTextSlugUpdate() {
    var newTitle = $("#newTitle").val();
    $("#newSlug").val(generateSlug(newTitle));
}

function generateSlug(text) {
    return text
        .toString()
        .toLowerCase()
        .replace(/^-+/, "")
        .replace(/-+$/, "")
        .replace(/\s+/g, "-")
        .replace(/\-\-+/g, "-")
        .replace(/[^\w\-]+/g, "");
}
$(document).on("click", ".create", function (e) {
    e.preventDefault();
    $("#add-modal").modal("show");
    texteditor();
});

$(document).on("click", ".add", function (e) {
    // console.log('test');
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let title = $('#add-modal input[name="title"]').val();
    let slug = $('#add-modal input[name="slug"]').val();
    let description = $('#add-modal input[name="description"]').val();
    let form = new FormData();
    form.append("title", title);
    form.append("slug", slug);
    form.append("description", description);
    $.ajax({
        url: baseUrl,
        method: "POST",
        data: form,
        cache: false,
        processData: false,
        contentType: false,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (data) {
            if (data.status == "true") {
                $("#add-modal").modal("hide");
                Swal.fire(data.title, data.description, data.icon).then(
                    function () {
                        location.reload();
                    }
                );
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            } else {
                toastr.clear();
                NioApp.Toast(
                    "<h5>" +
                        data.title +
                        "</h5><p>" +
                        data.description +
                        "</p>",
                    data.icon,
                    {
                        position: "top-right",
                    }
                );
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            }
        },
    });

    return false;
});
$(document).on("click", ".update", function (e) {
    e.preventDefault();
    let slug = $(this).data("slug");
    $.ajax({
        url: `${baseUrl}/${slug}/edit`,
        method: "GET",
        success: function (response) {
            if (response.status === "true") {
                let data = response.data;
                $('#change-modal input[name="title"]').val(data.title);
                $('#change-modal input[name="slug"]').val(data.slug);

                $('#change-modal textarea[name="description"]').val(
                    data.description
                );
                // Menyimpan slug asli sebelum pembaruan
                $('#change-modal input[name="id"]').val(data.id);

                $("#change-modal").modal("show");
                texteditor();
            } else {
                Swal.fire(
                    "Error",
                    "An error occurred while retrieving data.",
                    "error"
                );
            }
        },
        error: function () {
            Swal.fire(
                "Error",
                "An error occurred while retrieving data.",
                "error"
            );
        },
    });
});

$(document).on("click", ".save", function (e) {
    e.preventDefault();
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let id = $('#change-modal input[name="id"]').val();
    let slug = $('#change-modal input[name="slug"]').val();
    let title = $('#change-modal input[name="title"]').val();
    let description = $('#change-modal input[name="description"]').val();
    let form = new FormData();
    form.append("title", title);
    form.append("slug", slug);
    form.append("description", description);
    $.ajax({
        url: `${baseUrl}/${id}`,
        method: "PUT",
        data: form,
        cache: false,
        processData: false,
        contentType: false,
        dataType: "json",
        headers: {
            "X-CSRF-TOKEN": csrfToken,
        },
        success: function (data) {
            if (data.status === "true") {
                $("#change-modal").modal("hide");
                Swal.fire({
                    title: data.title,
                    text: data.description,
                    icon: data.icon,
                }).then(function () {
                    location.reload();
                });
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            } else {
                toastr.clear();
                NioApp.Toast(
                    "<h5>" +
                        data.title +
                        "</h5><p>" +
                        data.description +
                        "</p>",
                    data.icon,
                    {
                        position: "top-right",
                    }
                );
                $("div.spanner").removeClass("show");
                $("div.overlay").removeClass("show");
            }
        },
    });

    return false;
});
