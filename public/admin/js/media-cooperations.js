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
            data: function (row) {
                return dateIndo(row.begin);
            },
        },
        {
            data: function (row) {
                return dateIndo(row.end);
            },
        },
        {
            data: "media_name",
        },
        {
            data: function (row) {
                let salt = "PiscokGodog";
                let hashids = new Hashids(salt);
                let hashId = hashids.encode(row.id, 54715);
                let hashMedia = hashids.encode(row.media_id, 54715);
                let urlDetail = "/dashboard/cooperations/detail/" + hashId;
                let urlEdit = "/dashboard/cooperations/edit/" + hashId;
                let urlDelete = "/dashboard/cooperations/delete/" + hashId;

                let deleteButton = `
                    <li>
                        <form action="${urlDelete}" method="post">
                            <input type="hidden" name="_method" value="DELETE" />
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <a href="javascript:void(0)" class="delete">
                                <em class="icon ni ni-trash"></em><span>Hapus</span>
                            </a>
                        </form>
                    </li>`;

                let editButton = `
                    <li>
                        <a href="${urlEdit}">
                            <em class="icon ni ni-edit"></em><span>Ubah</span>
                        </a>
                    </li>`;

                return `<div class="nk-tb-col nk-tb-col-tools">
                    <ul class="nk-tb-actions gx-1 my-n1">
                        <li>
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-start">
                                    <ul class="link-list-opt no-bdr">
                                        <li>
                                            <a href="${urlDetail}"> <em class="icon ni ni-eye"></em><span>Detail</span></a>
                                        </li>
                                        ${editButton}
                                        ${deleteButton}
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
            data: function (row) {
                return dateIndo(row.begin);
            },
        },
        {
            data: function (row) {
                return dateIndo(row.end);
            },
        },
        {
            data: "media_name",
        },
        {
            data: function (row) {
                let salt = "PiscokGodog";
                let hashids = new Hashids(salt);
                let hashId = hashids.encode(row.id, 54715);
                let hashMedia = hashids.encode(row.media_id, 54715);
                let urlDetail = "/dashboard/cooperations/detail/" + hashId;
                let conditionalButtion = "";

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
