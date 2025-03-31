let baseUrl = "/dashboard/product";
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
    var name = $("#name").val();
    $("#slug").val(generateSlug(name));
}

function createTextSlugUpdate() {
    var newName = $("#newName").val();
    $("#newSlug").val(generateSlug(newName));
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
    let name = $('#add-modal input[name="name"]').val();
    let slug = $('#add-modal input[name="slug"]').val();
    let description = $('#add-modal input[name="description"]').val();
    let price = $('#add-modal input[name="price"]').val();
    let category_id = $('#add-modal select[name="category_id"]').val();
    let image = $('#add-modal input[name="image"]').prop("files")[0];
    let form = new FormData();
    form.append("name", name);
    form.append("slug", slug);
    form.append("image", image);
    form.append("category_id", category_id);
    form.append("description", description);
    form.append("price", price);
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
                $('#change-modal input[name="name"]').val(data.name);
                $('#change-modal input[name="slug"]').val(data.slug);
                $('#change-modal input[name="price"]').val(data.price);
                $('#change-modal textarea[name="description"]').val(
                    data.description
                );
                $('#change-modal select[name="category_id"]')
                    .val(data.category_id)
                    .trigger("change");

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
    let name = $('#change-modal input[name="name"]').val();
    let image = $('#change-modal input[name="image"]').prop("files")[0];
    let description = $('#change-modal input[name="description"]').val();
    let price = $('#change-modal input[name="price"]').val();
    let category_id = $('#change-modal select[name="category_id"]').val();
    let form = new FormData();
    form.append("name", name);
    form.append("slug", slug);
    form.append("image", image);
    form.append("price", price);
    form.append("category_id", category_id);
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
