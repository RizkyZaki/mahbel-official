$(document).ready(function () {
    $("#locus").change(function () {
        let locus = $("#locus").val();
        $.ajax({
            url: "/dashboard/issue-management/get-sub-locuses/" + locus,
            type: "GET",
            success: function (response) {
                $("#sub-locus").prop('disabled', false);
                $("#sub-locus").html('<option value="">-- Pilih --</option>');
                $.each(response, function (index, value) {
                    $("#sub-locus").append(
                        '<option value="' +
                        value.id +
                        '">' +
                        value.name +
                        "</option>"
                    );
                })
            },
        });
    })

    $("#classification").change(function () {
        let classification = $("#classification").val();
        $.ajax({
            url: "/dashboard/issue-management/get-sub-classifications/" + classification,
            type: "GET",
            success: function (response) {
                $("#sub-classification").prop('disabled', false);
                $("#sub-classification").html('<option value="">-- Pilih --</option>');
                $.each(response, function (index, value) {
                    $("#sub-classification").append(
                        '<option value="' +
                        value.id +
                        '">' +
                        value.name +
                        "</option>"
                    );
                })
            },
        });
    })

    let issue = $("#issue").val()
    if (issue != 'Krisis') {
        $("#description").css('display', 'block')
    } else {
        $("#description").css('display', 'none')
    }

    $("#issue").change(function () {
        let issue = $(this).val()
        if (issue != 'Krisis') {
            $("#description").css('display', 'block')
        } else {
            $("#description").css('display', 'none')
        }
    })
})
let csrfToken = $('meta[name="csrf-token"]').attr("content");
let DT_COLUMNS = [
    {
        data: "DT_RowIndex",
        orderable: false,
        searchable: false,
    },
    {
        data : "code"
    },
    {
        data : "media_name"
    },
    {
        data : "title"
    },
    {
        data: function (row) {
            if (row.get_locus && row.get_locus.name) {
                return row.get_locus.name
            }
        }
    },
    {
        data: function (row) {
            if (row.get_sub_locus && row.get_sub_locus.name) {
                return row.get_sub_locus.name
            }
        }
    },
    {
        data: function (row) {
            if (row.get_classification && row.get_classification.name) {
                return row.get_classification.name
            }
        }
    },
    {
        data: function (row) {
            if (row.get_sub_classification && row.get_sub_classification.name) {
                return row.get_sub_classification.name
            }
        }
    },
    {
        data: "issue",
    },
    {
        data: "response",
    },
    {
        data: "agency",
    },
    {
        data: function (row) {
            let salt = "PiscokGodog";
            let hashids = new Hashids(salt);
            let hashId = hashids.encode(row.id, 54715);

            let urlPrint = "/dashboard/issue-management/print/" + hashId;
            let urlEdit = "/dashboard/issue-management/edit/" + hashId;
            let urlDelete = "/dashboard/issue-management/delete/" + hashId;
            return `<div class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1 my-n1">
                    <li>
                        <div class="drodown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-start">
                                <ul class="link-list-opt no-bdr">
                                    <li> 
                                        <a href="${urlPrint}"> <em class="icon ni ni-printer"></em><span>Print Pdf</span></a>
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