let csrfToken = $('meta[name="csrf-token"]').attr("content");
let DT_COLUMNS;
if (role == 1) {
    DT_COLUMNS = [
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
            data: "offer_file",
            orderable: false,
            searchable: false,
        },
        {
            data: function (row) {
                if (row.status == "0") {
                    return `<div class="badge bg-warning">Menunggu</div>`;
                } else if (row.status == "1") {
                    return `<div class="badge bg-success">Menerima</div>`;
                } else if (row.status == "2") {
                    return `<div class="badge bg-danger">Menolak</div>`;
                } else {
                    return `<div class="badge bg-secondary">Tidak Diketahui</div>`;
                }
            },
        },
        {
            data: function (row) {
                let salt = "PiscokGodog";
                let hashids = new Hashids(salt);
                let hashId = hashids.encode(row.id, 54715);
                let hashMedia = hashids.encode(row.media_id, 54715);
                let hashCompanyId = hashids.encode(row.company_id, 54715);

                // Dalam Proses Developer @Zaki
                // let urlDetail = "/dashboard/media-order/detail/" + hashId;
                // let urlDetail = "javascript:void(0);";
                let urlDetail =
                    "/dashboard/cooperations/propose/" +
                    hashId +
                    "/" +
                    hashCompanyId +
                    "/detail";
                let urlDelete =
                    "/dashboard/cooperations/propose/" + hashId + "/delete";
                let urlAcc = "/dashboard/cooperations/propose/acc/" + hashId;
                let urlRej = "/dashboard/cooperations/propose/rej/" + hashId;

                let actionButtons = `
                    <li>
                        <a href="${urlDetail}">
                            <em class="icon ni ni-eye"></em><span>Detail</span>
                        </a>
                    </li>
                    <li>
                        <form action="${urlDelete}" method="post">
                        <input type="hidden" name="_method" value="DELETE" />
                        <input type="hidden" name="_token" value="${csrfToken}">
                        <a href="javascript:void(0)" class="delete"><em
                                class="icon ni ni-trash"></em><span>Hapus</span></a>
                        </form>
                    </li>`;

                if (row.status == "0") {
                    actionButtons += `
                        <li>
                            <a href="${urlAcc}">
                                <em class="icon ni ni-check"></em><span>Terima</span>
                            </a>
                        </li>
                        <li>
                            <a href="${urlRej}">
                                <em class="icon ni ni-cross"></em><span>Tolak</span>
                            </a>
                        </li>`;
                }

                return `
                    <div class="nk-tb-col nk-tb-col-tools">
                        <ul class="nk-tb-actions gx-1 my-n1">
                            <li>
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown">
                                        <em class="icon ni ni-more-h"></em>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-start">
                                        <ul class="link-list-opt no-bdr">
                                            ${actionButtons}
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>`;
            },
        },
    ];
} else {
    DT_COLUMNS = [
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
            data: "offer_file",
            orderable: false,
            searchable: false,
        },
        {
            data: function (row) {
                if (row.status == "0") {
                    return `<div class="badge bg-warning">Menunggu</div>`;
                } else if (row.status == "1") {
                    return `<div class="badge bg-success">Diterima</div>`;
                } else if (row.status == "2") {
                    return `<div class="badge bg-danger">Ditolak</div>`;
                } else {
                    return `<div class="badge bg-secondary">Tidak Diketahui</div>`;
                }
            },
        },
        {
            data: function (row) {
                let salt = "PiscokGodog";
                let hashids = new Hashids(salt);
                let hashId = hashids.encode(row.id, 54715);
                let hashMedia = hashids.encode(row.media_id, 54715);
                let hashCompanyId = hashids.encode(row.company_id, 54715);

                let urlDetail =
                    "/dashboard/cooperations/propose/" +
                    hashId +
                    "/" +
                    hashCompanyId +
                    "/detail";
                // let urlDetail = "javascript:void(0);";

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
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>`;
            },
        },
    ];
}
