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
            data: "media_status",
        },
        {
            data: function (row) {
                let salt = "PiscokGodog";
                let hashids = new Hashids(salt);
                let hashId = hashids.encode(row.id, 54715);
                let hashMedia = hashids.encode(row.media_id, 54715);
                let urlDetail =
                    "/dashboard/media-order/detail/" +
                    hashId +
                    "?media=" +
                    hashMedia;
                let urlPrint = "/dashboard/media-order/print/" + hashId;
                let urlEdit = "/dashboard/media-order/edit/" + hashId;
                let urlDelete = "/dashboard/media-order/delete/" + hashId;

                // Kondisional untuk menambahkan opsi hapus hanya jika media_status adalah '1'
                let deleteButton =
                    row.media_status !== "Menerima"
                        ? `
                    <li>
                        <form action="${urlDelete}" method="post">
                            <input type="hidden" name="_method" value="DELETE" />
                            <input type="hidden" name="_token" value="${csrfToken}">
                            <a href="javascript:void(0)" class="delete">
                                <em class="icon ni ni-trash"></em><span>Hapus</span>
                            </a>
                        </form>
                    </li>`
                        : "";

                let editButton =
                    row.media_status !== "Menerima"
                        ? `
                    <li>
                        <a href="${urlEdit}">
                            <em class="icon ni ni-edit"></em><span>Ubah</span>
                        </a>
                    </li>`
                        : "";

                let printButton =
                    row.media_status !== "Menerima"
                        ? `
                    <li>
                        <a href="${urlPrint}">
                            <em class="icon ni ni-printer"></em><span>Print pdf</span>
                        </a>
                    </li>`
                        : "";

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
                                        ${printButton}
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
                const date = new Date();
                const year = date.getFullYear();
                const month = date.getMonth() + 1;
                const day = date.getDate();

                const formattedDate = `${year}-${String(month).padStart(
                    2,
                    "0"
                )}-${String(day).padStart(2, "0")}`;
                if (row.begin > formattedDate && row.media_status == "0") {
                    return `<div class="badge bg-warning">Menunggu</div>`;
                } else if (row.media_status == "1") {
                    return `<div class="badge bg-success">Diterima</div>`;
                } else if (row.media_status == "2") {
                    return `<div class="badge bg-danger">Ditolak</div>`;
                } else {
                    return `<div class="badge bg-secondary">Kadaluarsa</div>`;

                }
            },
        },
        {
            data: function (row) {
                let salt = "PiscokGodog";
                let hashids = new Hashids(salt);
                let hashId = hashids.encode(row.id, 54715);
                let hashMedia = hashids.encode(row.media_id, 54715);
                let urlDetail = "/dashboard/media-order/detail/" + hashId;
                let urlPrint = "/dashboard/media-order/print/" + hashId;
                let urlAcc = "/dashboard/media-order/accept/" + hashId;
                let urlProof =
                    "/dashboard/media-order/upload-proof/" +
                    hashId +
                    "/" +
                    hashMedia;
                let urlFinish =
                    "/dashboard/media-order/upload-finish/" +
                    hashId +
                    "/" +
                    hashMedia;
                let urlReject = "/dashboard/media-order/reject/" + hashId;
                let status = "";
                const date = new Date();
                const year = date.getFullYear();
                const month = date.getMonth() + 1;
                const day = date.getDate();

                let conditionalButtion = "";

                if (role == "1") {
                    conditionalButtion = `
                    <li>
                        <a href="${urlPrint}"> <em class="icon ni ni-printer"></em><span>Print pdf</span></a>
                    </li>`;
                } else {
                    conditionalButtion = "";
                }

                const formattedDate = `${year}-${String(month).padStart(
                    2,
                    "0"
                )}-${String(day).padStart(2, "0")}`;
                // if (row.begin > formattedDate && (row.media_status == '0'  || row.media_status == '3')) {
                if (row.begin > formattedDate && row.media_status == "0") {
                    status = `<li>
                        <a href="${urlAcc}"> <em class="icon ni ni-check"></em><span>Terima</span></a>
                    </li>
                    <li>
                        <a href="${urlReject}"> <em class="icon ni ni-cross"></em><span>Tolak</span></a>
                    </li>`;
// <<<<<<< HEAD
//                 } else if (row.begin <= formattedDate && row.media_status == '0') {
//                     status = `<li>
//                         <div> <em class="icon ni ni-na"></em><span>Tawaran Kadaluarsa</span></div>
//                     </li>`;
//                 } else if (row.media_status == '1') {
//                     if (row.amount_report > row.report) {
//                         status = `<li>
//                             <a href="${urlProof}"> <em class="icon ni ni-upload"></em><span>Kirim Bukti</span></a>
//                         </li>`;
//                     } else {
//                         if (row.media_status == '1') {
//                             status = `<li>
//                                 <a href="${urlFinish}"> <em class="icon ni ni-check"></em><span>Selesai</span></a>
//                             </li>`;
//                         }
// =======
                } else if (
                    row.begin <= formattedDate &&
                    row.media_status == "0"
                ) {
                    status = `<li>
                        <div> <em class="icon ni ni-na"></em><span>Tawaran Kadaluarsa</span></div>
                    </li>`;
                } else if (row.media_status == "1") {
                    if (row.amount_report > row.report) {
                        status = `<li>
                        <a href="${urlProof}"> <em class="icon ni ni-upload"></em><span>Kirim Bukti</span></a>
                    </li>`;
// >>>>>>> dd60b79 (revision point 1 and replace media order)
                    }

                    // $.ajax({
                    //     url: "/dashboard/media-order/check-status",
                    //     type: "POST",
                    //     data: {
                    //         media_order_id: row.id,
                    //         _token: $('meta[name="csrf-token"]').attr(
                    //             "content"
                    //         ),
                    //     },
                    //     async: false, // Supaya data di-render setelah AJAX selesai
                    //     success: function (response) {
                    //         if (response.showFinishButton) {
                    //             status += `<li>
                    //                 <a href="${urlFinish}"> <em class="icon ni ni-check"></em><span>Selesai</span></a>
                    //             </li>`;
                    //         }
                    //     },
                    //     error: function (xhr) {
                    //         console.info(
                    //             "Error:",
                    //             "ERROR PADA BAGIAN CHECK STATUS"
                    //         );
                    //     },
                    // });

                    // if(row.media_status == '1' && row.media_status != '4'){
                    //     status += `<li>
                    //         <a href="${urlFinish}"> <em class="icon ni ni-check"></em><span>Selesai</span></a>
                    //     </li>`
                    // }
                } else if (row.media_status == "2") {
                    status = `<li>
                        <div> <em class="icon ni ni-na"></em><span>Tawaran Ditolak</span></div>
                    </li>`;
                }

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
                                        ${conditionalButtion}
                                        ${status}
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
