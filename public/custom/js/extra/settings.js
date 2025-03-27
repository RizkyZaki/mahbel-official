let baseUrl = "/dashboard/settings";
$(document).on("click", ".site", function (e) {
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let name = $('input[name="name"]').val();
    let description = $('textarea[name="description"]').val();
    let keyword = $('input[name="keyword"]').val();
    let logo = $('input[name="logo"]').prop("files")[0];
    let form = new FormData();
    form.append("name", name);
    form.append("logo", logo);
    form.append("keyword", keyword);
    form.append("description", description);
    $.ajax({
        url: `${baseUrl}/site`,
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
});
$(document).on("click", ".cp", function (e) {
    $("div.spanner").addClass("show");
    $("div.overlay").addClass("show");
    let email = $('input[name="email"]').val();
    let link_tiktok = $('input[name="link_tiktok"]').val();
    let phone = $('input[name="phone"]').val();
    let address = $('input[name="address"]').val();
    let link_instagram = $('input[name="link_instagram"]').val();
    let link_facebook = $('input[name="link_facebook"]').val();
    let link_twitter = $('input[name="link_twitter"]').val();
    let link_shopee = $('input[name="link_shopee"]').val();
    let link_tokopedia = $('input[name="link_tokopedia"]').val();
    let form = new FormData();

    form.append("email", email);
    form.append("link_tiktok", link_tiktok);
    form.append("link_shopee", link_shopee);
    form.append("link_instagram", link_instagram);
    form.append("link_facebook", link_facebook);
    form.append("link_shopee", link_shopee);
    form.append("link_tokopedia", link_tokopedia);
    form.append("link_twitter", link_twitter);
    form.append("phone", phone);
    form.append("address", address);
    $.ajax({
        url: `${baseUrl}/contact`,
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
});
