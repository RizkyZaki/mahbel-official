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
        data: "description",
    },
    {
        data: function (row) {
            if (row.status == '0') {
                return `<div class="badge bg-warning">Menunggu</div>`
            } else if (row.status == '1') {
                return `<div class="badge bg-success">Diterima</div>`
            } else if (row.status == '2') {
                return `<div  class="badge bg-danger">Ditolak</div>`
            } else {
                return `<div  class="badge bg-primary">Selesai</div>`
            }
        }
    },
    {
        data: function (row) {
            let salt = "PiscokGodog";
            let hashids = new Hashids(salt);
            let hashId = hashids.encode(row.id, 54715);

            let urlAcc = "/dashboard/request-edit/accept/" + hashId;
            let urlReject = "/dashboard/request-edit/reject/" + hashId;
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
                                            <a href="${urlReject}"> <em class="icon ni ni-cross"></em><span>Tolak</span></a>                            
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
