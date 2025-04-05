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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="row g-gs preview-icon-svg">

                <li class="col-lg-3 col-sm-6 col-12">
                    <div class="card bg-primary h-100">
                        <div class="nk-ecwg nk-ecwg1">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title text-white">Total</h6>
                                    </div>

                                </div>
                                <div class="data">
                                    <div class="amount text-white">{{ $countProd }}</div>
                                    <div class="info text-white">Products</div>
                                </div>


                            </div><!-- .card-inner -->

                        </div><!-- .nk-ecwg -->
                    </div>
                </li><!-- .col -->
                <li class="col-lg-3 col-sm-6 col-12">
                    <div class="card bg-success h-100">
                        <div class="nk-ecwg nk-ecwg1">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title text-white">Total</h6>
                                    </div>

                                </div>
                                <div class="data">
                                    <div class="amount text-white">{{ $countCat }}</div>
                                    <div class="info text-white">Categories</div>
                                </div>
                            </div><!-- .card-inner -->

                        </div><!-- .nk-ecwg -->
                    </div>
                </li><!-- .col -->
                <li class="col-lg-3 col-sm-6 col-12">
                    <div class="card bg-danger h-100">
                        <div class="nk-ecwg nk-ecwg1">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title text-white">Total</h6>
                                    </div>

                                </div>
                                <div class="data">
                                    <div class="amount text-white">{{ $countContact }}</div>
                                    <div class="info text-white">Message</div>
                                </div>

                            </div><!-- .card-inner -->

                        </div><!-- .nk-ecwg -->
                    </div>
                </li><!-- .col -->
            </ul>
        </div>
    </div>
@endsection
