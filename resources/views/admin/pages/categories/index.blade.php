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
                                    <h4 class="nk-block-title">{{ $title }}</h4>
                                    <p>{{ $heading }}</p>
                                </div>
                                <div class="nk-block-head-content">

                                    <button class="btn btn-primary create"><em class="icon ni ni-plus"></em> <span>
                                            Tambah</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card card-preview">
                        <div class="card-inner">
                            <table class="datatable-init table " data-auto-responsive="false">
                                <thead>
                                    <tr>
                                        <th class="nk-tb-col nk-tb-col-check">
                                            #
                                        </th>
                                        <th class="nk-tb-col">Nama Kategori</th>
                                        <th class="nk-tb-col tb-col-mb">Jumlah Produk</th>
                                        <th class="nk-tb-col tb-col-mb">Dibuat Pada</th>
                                        <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($collection as $item)
                                        <tr class="">
                                            <td class="nk-tb-col">
                                                {{ $no++ }}
                                            </td>
                                            <td class="nk-tb-col"><span class="">{{ $item->name }}</span></td>
                                            <td class="nk-tb-col tb-col-mb"><span
                                                    class="">{{ $item->products()->count() }}</span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb"><span
                                                    class="">{{ timesInd($item->created_at) }}</span>
                                            </td>
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
                                                                    <li><a href="javascript:void(0);"
                                                                            data-slug={{ $item->slug }} class="update"><em
                                                                                class="icon ni ni-pen"></em><span>Edit</span></a>
                                                                    </li>
                                                                    <li><a href="javascript:void(0);" data-url="category"
                                                                            data-identity={{ $item->slug }}
                                                                            class="delete"><em
                                                                                class="icon ni ni-trash"></em><span>Delete</span></a>
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
    <div class="modal fade" tabindex="-1" id="add-modal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Nama Kategori <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" onkeyup="createTextSlug()" id="name"
                                name="name" placeholder="Nama Kategori">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Slug" id="slug"
                                readonly>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputText">Gambar</label>
                            <input type="file" class="form-control " name="image" id="image"
                                aria-describedby="emailHelp">
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button class="btn add btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="change-modal">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross"></em>
                </a>
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kategori</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Nama Kategori <small class="text-danger">*</small></label>
                            <input type="text" class="form-control" onkeyup="createTextSlugUpdate()" id="newName"
                                name="name" placeholder="Nama Kategori">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="Slug" id="newSlug"
                                readonly>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="inputText">Gambar</label>
                            <input type="file" class="form-control " name="image" id="image"
                                aria-describedby="emailHelp">
                            <input type="hidden" name="id">
                        </div>

                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button class="btn save btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    @push('customJs')
        <script>
            let csrfToken = $('meta[name="csrf-token"]').attr("content");
        </script>
        <script src="{{ asset('custom/js/utils/delete.js') }}"></script>
        <script src="{{ asset('custom/js/master/categories.js') }}"></script>
    @endpush
@endsection
