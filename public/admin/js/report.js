let csrfToken = $('meta[name="csrf-token"]').attr("content")
let DT_COLUMNS
if (role == 1) {
    DT_COLUMNS = [
        {
            data: "DT_RowIndex",
            orderable: false,
            searchable: false,
        },
        {
            data : "media_name"
        },
        {
            data: function (row) {
                if (row.get_media_order && row.get_media_order.name) {
                    return row.get_media_order.name
                }
            }
        },
        {
            data: "title",
        },
        {
            data: function (row) {
                return `<a href="${row.link}" target="_blank" style="text-decoration : underline">${row.link}</a>`
            },
        },
        {
            data: function (row) {
                return dateIndo(row.broadcast)
            }
        },
        {
            data: function (row) {
                if (row.status == '0') {
                    return `<div class="badge bg-warning">Menunggu</div>`
                } else if (row.status == '1') {
                    return `<div class="badge bg-success">Diterima</div>`
                } else {
                    return `<div class="badge bg-danger">Ditolak</div>`
                }
            }
        },
        {
            data: function (row) {
                let salt = "PiscokGodog"
                let hashids = new Hashids(salt)
                let hashId = hashids.encode(row.id, 54715)

                let urlDetail = "/dashboard/report/detail/" + hashId
                let urlPrint = "/dashboard/report/print/" + hashId
                let urlAcc = "/dashboard/report/accept/" + hashId
                let urlReject = "/dashboard/report/reject/" + hashId
                let urlDelete = "/dashboard/report/delete/" + hashId
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
                                            <a href="${urlAcc}"> <em class="icon ni ni-check"></em><span>Terima</span></a>
                                        </li>
                                        <li>
                                            <a href="${urlReject}"> <em class="icon ni ni-cross"></em><span>Tolak</span></a>
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
                </div>`
            },
        },
    ]
} else {
    DT_COLUMNS = [
        {
            data: "DT_RowIndex",
            orderable: false,
            searchable: false,
        },
        {
            data: function (row) {
                if (row.get_media && row.get_media.name) {
                    return row.get_media.name
                }
            }
        },
        {
            data: function (row) {
                if (row.get_media_order && row.get_media_order.name) {
                    return row.get_media_order.name
                }
            }
        },
        {
            data: "title",
        },
        {
            data: function (row) {
                return `<a href="${row.link}" target="_blank" style="text-decoration : underline">${row.link}</a>`
            },
        },
        {
            data: function (row) {
                return dateIndo(row.broadcast)
            }
        },
        {
            data: function (row) {
                if (row.status == '0') {
                    return `<div class="badge bg-warning">Menunggu</div>`
                } else if (row.status == '1') {
                    return `<div class="badge bg-success">Diterima</div>`
                } else {
                    return `<div class="badge bg-danger">Ditolak</div>`
                }
            }
        },
        {
            data: function (row) {
                let salt = "PiscokGodog"
                let hashids = new Hashids(salt)
                let hashId = hashids.encode(row.id, 54715)

                let urlDetail = "/dashboard/report/detail/" + hashId
                let urlPrint = "/dashboard/report/print/" + hashId
                let urlEdit = "/dashboard/report/edit/" + hashId
                let urlDelete = "/dashboard/report/delete/" + hashId
                if (row.status == '0') {
                    return `<div class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
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
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>`
                } else if (row.status == '1') {
                    return `<div class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li>
                                                <div> <em class="icon ni ni-thumbs-up"></em><span>Laporan diterima</span></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>`
                } else if (row.status == '2') {
                    return `<div class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li>
                                                <a href="${urlEdit}"> <em class="icon ni ni-thumbs-down"></em><span>Laporan ditolak, perbaiki!</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>`
                }
            },
        },
    ]
}
