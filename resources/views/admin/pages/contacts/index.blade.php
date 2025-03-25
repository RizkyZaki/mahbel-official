@extends('admin.layout.main')

@section('content-admin')
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">

                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head nk-block-head-sm">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">{{ $heading }}</h4>
                                    <p>ini adalah kumpulan data Pesan Pengguna</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card card-bordered card-preview">
                        <div class="card-inner">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col nk-tb-col-check">
                                            #
                                        </th>
                                        <th class="nk-tb-col">Nama</th>
                                        <th class="nk-tb-col tb-col-mb">Email</th>
                                        <th class="nk-tb-col tb-col-mb">Subjek</th>
                                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($contact as $item)
                                        <tr class="nk-tb-item">
                                            <td class="nk-tb-col">
                                                {{ $no++ }}
                                            </td>
                                            <td class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-info">
                                                        <span class="tb-lead"> {{ $item->name }} </span>
                                                        <span> {{ timesInd($item->created_at) }} </span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb title"><span
                                                    class="tb-lead">{{ $item->email }}</span></td>
                                            <td class="nk-tb-col tb-col-mb title"><span
                                                    class="tb-lead">{{ $item->subject }}</span></td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger"
                                                                data-bs-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="" data-id={{ $item->id }}
                                                                            data-name={{ $item->name }} class="detail"><em
                                                                                class="icon ni ni-info"></em><span>Detail</span></a>
                                                                    </li>
                                                                    <li><a href="" data-url="contact"
                                                                            data-identity={{ $item->id }}
                                                                            data-name={{ $item->name }} class="hapus"><em
                                                                                class="icon ni ni-trash"></em><span>Hapus</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div><!-- .card-preview -->
                    </div> <!-- nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Content Code -->
    <div class="modal fade" id="modal-detail" tabindex="-1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pesan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 class="fw-bold">
                        Nama
                    </h6>
                    <p class="mb-3" id="detailNama">
                    </p>
                    <h6 class="fw-bold">
                        No Handphone
                    </h6>
                    <p class="mb-3" id="detailPhone">
                    </p>
                    <h6 class="fw-bold">
                        Email
                    </h6>
                    <p class="mb-3" id="detailEmail">
                    </p>
                    <h6 class="fw-bold">
                        Deskripsi
                    </h6>
                    <p id="detailDescription"></p>
                </div>
            </div>
        </div>
    </div><!-- End Basic Modal-->

    @push('customJs')
        <script>
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
        </script>
        <script src="{{ asset('admin/logic/delete.js') }}"></script>
        <script src="{{ asset('admin/logic/extra/contact.js') }}"></script>
    @endpush
@endsection
