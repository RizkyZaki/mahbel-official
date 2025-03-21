$(document).ready(function () {
    $("#row-date").css('display', 'none')
    $("#row-status").css('display', 'none')

    $("#by").change(function () {
        let by = $("#by").val();
        if (by == '0') {
            $("#row-date").css('display', 'block');
            $("#row-status").css('display', 'none')
        } else if (by == '1') {
            $("#row-date").css('display', 'none');
            $("#row-status").css('display', 'block')
        } else {
            $("#row-date").css('display', 'none');
            $("#row-status").css('display', 'none')
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
        data: "name",
    },
    {
        data: "company_name",
    },
    {
        data: "type",
    },
    {
        data: "classification",
    },
    {
        data: function (row) {
            if (row.link) {
                return `<a href="${row.link}" target="_blank" style="text-decoration:underline">${row.link}</a>`;
            } else {
                return `<div class="badge bg-danger">Media tidak memiliki link</div>`
            }
        }
    },
    {
        data: "address",
    },
    {
        data: function (row) {
            if (row.get_status && row.get_status.status) {
                if (row.get_status.status == '0') {
                    return `<div class="badge bg-warning">Menunggu</div>`;
                } else if (row.get_status.status == '1') {
                    return `<div class="badge bg-success">Diterima</div>`;
                } else {
                    return `<div class="badge bg-danger">Ditolak</div>`;
                }
            } else {
                return `<div class="badge bg-info">Status not available</div>`;
            }
        }
    },
    {
        data: function (row) {
            if (row.status_edit == '0') {
                return `<div class="badge bg-warning">Menunggu</div>`;
            } else if (row.status_edit == '1') {
                return `<div class="badge bg-success">Diterima</div>`;
            } else if (row.status_edit == '2') {
                return `<div class="badge bg-danger">Ditolak</div>`;
            } else {
                return `<div class="badge bg-secondary">Tidak Ada</div>`;
            }
        }
    },
    {
        data: function (row) {
            let salt = "PiscokGodog";
            let hashids = new Hashids(salt);
            let hashId = hashids.encode(row.id, 54715);

            let urlDetail = "/dashboard/media/detail/" + hashId;
            let urlPrint = "/dashboard/media/print/" + hashId;
            let urlEdit = "/dashboard/media/edit/" + hashId;
            let urlDelete = "/dashboard/media/delete/" + hashId;
            let urlAccEdit = "/dashboard/media/accept-request/" + hashId;
            let urlRejectEdit = "/dashboard/media/reject-request/" + hashId;
            let urlDetailEdit = "/dashboard/media/detail-request/" + hashId;
            let conditionalButton = row.status_edit == 0
                ? `<li>
                    <a href="${urlAccEdit}">
                    <em class="icon ni ni-check"></em>
                    <span>Terima Permintaan Edit</span>
                    </a>
                </li>
                <li>
                    <a href="${urlRejectEdit}">
                    <em class="icon ni ni-cross"></em>
                    <span>Terima Permintaan Edit</span>
                    </a>
                </li>
                <li>
                    <a href="${urlDetailEdit}">
                    <em class="icon ni ni-eye"></em>
                    <span>Lihat Permintaan Edit</span>
                    </a>
                </li>`
                : '';
            return `<div class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1 my-n1">
                    <li>
                        <div class="drodown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-start">
                                <ul class="link-list-opt no-bdr">
                                    <li> 
                                        <a href="${urlDetail}"> <em class="icon ni ni-eye"></em><span>Detail</span></a>
                                    </li>
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
                                    ${conditionalButton}
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>`;
        },
    },

];