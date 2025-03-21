$("document").ready(function () {
    $("input[name='type']").change(function () {
        let type = $("input[name='type']:checked").val();
        if (type == 'online') {
            $("#row-link").show();
        } else {
            $("#row-link").hide();
        }
    });
    let myInput = $("#password");
    let letter = $("#letter");
    let capital = $("#capital");
    let number = $("#number");
    let symbol = $("#symbol");
    let length = $("#length");
    let feedback = $("#feedback");
    let progress = $(".progress-bar");

    myInput.focus(function () {
        $("#message").css("display", "block");
    });

    myInput.blur(function () {
        $("#message").css("display", "none");
    });

    myInput.keyup(function () {
        let lowerCaseLetters = /[a-z]/g;
        if (myInput.val().match(lowerCaseLetters)) {
            letter.removeClass("invalid").addClass("valid");
        } else {
            letter.removeClass("valid").addClass("invalid");
        }

        let upperCaseLetters = /[A-Z]/g;
        if (myInput.val().match(upperCaseLetters)) {
            capital.removeClass("invalid").addClass("valid");
        } else {
            capital.removeClass("valid").addClass("invalid");
        }

        let numbers = /[0-9]/g;
        if (myInput.val().match(numbers)) {
            number.removeClass("invalid").addClass("valid");
        } else {
            number.removeClass("valid").addClass("invalid");
        }

        if (myInput.val().length >= 8) {
            length.removeClass("invalid").addClass("valid");
        } else {
            length.removeClass("valid").addClass("invalid");
        }

        let symbols = /[!$#%@]/g;
        if (myInput.val().match(symbols)) {
            symbol.removeClass("invalid").addClass("valid");
        } else {
            symbol.removeClass("valid").addClass("invalid");
        }
    });
})
let csrfToken = $('meta[name="csrf-token"]').attr("content");
let DT_COLUMNS = [
    {
        data: "DT_RowIndex",
        orderable: false,
        searchable: false,
    },
    {
        data: "name",
    },
    {
        data: "email",
    },
    {
        data: "role_name",
    },
    {
        data: function (row) {
            if (row.status == '0') {
                return `<div class="badge bg-warning">Menunggu</div>`
            } else if (row.status == '1') {
                return `<div class="badge bg-success">Aktif</div>`
            } else {
                return `<div class="badge bg-danger">Nonaktif</div>`
            }
        }
    },
    {
        data: function (row) {
            let salt = "PiscokGodog";
            let hashids = new Hashids(salt);
            let hashId = hashids.encode(row.id, 54715);

            let urlResetPass = "/dashboard/user/reset-password/" + hashId;
            let urlEdit = "/dashboard/user/edit/" + hashId;
            let urlDelete = "/dashboard/user/delete/" + hashId;
            return `<div class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1 my-n1">
                    <li>
                        <div class="drodown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-start">
                                <ul class="link-list-opt no-bdr">
                                    <li>
                                        <form action="${urlResetPass}" method="post">
                                            <input type="hidden" name="_method" value="PUT" />
                                            <input type="hidden" name="_token" value="${csrfToken}">
                                            <a href="javascript:void(0)" class="reset-pass"><em
                                                    class="icon ni ni-lock"></em><span>Reset Kata Sandi</span></a>
                                        </form>
                                    </li>
                                    <li> 
                                        <a href="${urlEdit}"> <em class="icon ni ni-edit"></em><span>Ubah</span></a>
                                    </li>
                                    <li>
                                        <form action="${urlDelete}" method="post">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <input type="hidden" name="_token" value="${csrfToken}">
                                        <a href="javascript:void(0)" class="delete"><em
                                                class="icon ni ni-trash"></em><span>Hapus</span></a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>`;
        },
    },
];