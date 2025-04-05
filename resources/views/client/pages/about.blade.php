@extends('client.layout.main')

@section('content-client')
    <section class="wrapper image-wrapper bg-image bg-overlay text-white"
        data-image-src="{{ asset('client/img/photos/bg14.png') }}">
        <div class="container pt-18 pb-15 pt-md-20 pb-md-19 text-center">
            <div class="row">
                <div class="col-md-10 col-xl-8 mx-auto">
                    <div class="post-header">
                        <div class="post-category text-line text-white">
                            <a href="blog-post2.html#" class="text-reset" rel="category">About</a>
                        </div>
                        <!-- /.post-category -->
                        <h1 class="display-2 mb-4 text-white">{{ $data->title }}</h1>

                        <!-- /.post-meta -->
                    </div>
                    <!-- /.post-header -->
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->
    <section class="wrapper">
        <div class="container pb-14 pb-md-16">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="blog single mt-n17">
                        <div class="card">

                            <div class="card-body">
                                <div class="classic-view">
                                    <article class="post">
                                        <div class="post-content mb-5">
                                            <!-- /.card -->
                                            {!! $data->description !!}
                                        </div>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <!-- /.blog -->
                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
    </section>
@endsection
