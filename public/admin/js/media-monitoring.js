let csrfToken = $('meta[name="csrf-token"]').attr("content");
let DT_COLUMNS = [
    {
        data: "DT_RowIndex",
        orderable: false,
        searchable: false,
    },
    {
        data: "username",
    },
    {
        data: "code",
    },
    {
        data: function (row) {
            return dateIndo(row.created_at)
        },
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
        data: "theme",
    },
    {
        data: "media_name",
    },
    {
        data: "writter",
    },
    {
        data: "issue_status",
    },
    {
        data: function (row) {
            let salt = "PiscokGodog";
            let hashids = new Hashids(salt);
            let hashId = hashids.encode(row.id, 54715);
            let urlCreateMedia = "/dashboard/issue-management/create/" + hashId
            let urlDetail = "/dashboard/media-monitoring/detail/" + hashId;
            let urlPrint = "/dashboard/media-monitoring/print/" + hashId;
            let urlEdit = "/dashboard/media-monitoring/edit/" + hashId;
            let urlDelete = "/dashboard/media-monitoring/delete/" + hashId;
            let buttonAdd
            if (!row.issue_management_id) {
                buttonAdd = `
                        <li>
                            <a href="${urlCreateMedia}"> <em class="icon ni ni-plus"></em><span>Tambah Isu</span></a>
                        </li>
                    `
            }
            let buttonAddSection = buttonAdd ? buttonAdd : '';
            return `<div class="nk-tb-col nk-tb-col-tools">
                <ul class="nk-tb-actions gx-1 my-n1">
                    <li>
                        <div class="drodown">
                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger me-n1" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                            <div class="dropdown-menu dropdown-menu-start">
                                <ul class="link-list-opt no-bdr">
                                    ${buttonAddSection}
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
            </div>`;
        },
    },
];
