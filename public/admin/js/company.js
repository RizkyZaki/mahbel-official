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

    $("#reject").on("show.bs.modal", function (event) {
        let button = $(event.relatedTarget);
        let formAction = button.data('action');
        let modal = $(this);
        modal.find('form').attr('action', formAction);
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
        data: "email",
    },
    {
        data: "director",
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
        data: "address",
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
        data: "regist_date",
    },
    {
        data: function (row) {
            if (row.validation_date) {
                return row.validation_date;
            } else {
                return `<div class="badge bg-danger">Belum di validasi</div>`;
            }
        }
    },
    {
        data: function (row) {
            let salt = "PiscokGodog";
            let hashids = new Hashids(salt);
            let hashId = hashids.encode(row.id, 54715);

            let urlAcc = "/dashboard/company/accept/" + hashId;
            let urlReject = "/dashboard/company/reject/" + hashId;
            let urlDetail = "/dashboard/company/detail/" + hashId;
            let urlPrint = "/dashboard/company/print/" + hashId;
            let urlEdit = "/dashboard/company/edit/" + hashId;
            let urlDelete = "/dashboard/company/delete/" + hashId;
            let urlAccEdit = "/dashboard/company/accept-request/" + hashId;
            let urlRejectEdit = "/dashboard/company/reject-request/" + hashId;
            let urlDetailEdit = "/dashboard/company/detail-request/" + hashId;
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
                    <span>Tolak Permintaan Edit</span>
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
                                        <a href="${urlAcc}"> <em class="icon ni ni-check"></em><span>Terima</span></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#reject" data-id="${row.id}" data-action="${urlReject}"> <em class="icon ni ni-cross"></em><span>Tolak</span></a>
                                    </li>
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
            </div>
            `;
        },
    },
];
