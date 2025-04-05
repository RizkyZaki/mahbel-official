@extends('client.layout.main')
@section('content-client')
    <section class="wrapper image-wrapper bg-soft-primary ">
        <div class="container py-14 py-md-16 text-center">
            <div class="row">
                <div class="col-md-9 col-lg-7 col-xl-7 mx-auto text-center">

                    <h2 class="display-4 mb-3">{{ $title }}</h2>

                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->

            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <section class="wrapper">
        <div class="container py-14 py-md-16 mb-16">
            <section class="wrapper bg-light">
                <div class="container py-14 py-md-16">
                    <div class="row gx-md-8 gx-xl-12 gy-8">
                        <div class="col-lg-6">
                            <div class="swiper-container swiper-thumbs-container" data-margin="10" data-dots="false"
                                data-nav="true" data-thumbs="true">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <figure class="rounded"><img src="{{ asset('storage/assets/' . $data->image) }}"
                                                    srcset="{{ asset('storage/assets/' . $data->image) }}"
                                                    alt="" /><a class="item-link"
                                                    href="{{ asset('storage/assets/' . $data->image) }}" data-glightbox
                                                    data-gallery="product-group"><i class="uil uil-focus-add"></i></a>
                                            </figure>
                                        </div>
                                        <!--/.swiper-slide -->
                                    </div>
                                    <!--/.swiper-wrapper -->
                                </div>
                                <!-- /.swiper -->

                                <!-- /.swiper -->
                            </div>
                            <!-- /.swiper-container -->
                        </div>
                        <!-- /column -->
                        <div class="col-lg-6">
                            <div class="post-header mb-5">
                                <h2 class="post-title display-5"><a href="./shop-product.html"
                                        class="link-dark">{{ $data->name }}</a></h2>
                                <p class="price fs-20 mb-2"><span class="amount">{{ formatIDR($data->price) }}</span></p>

                            </div>
                            <!-- /.post-header -->
                            <p class="mb-6">{!! $data->description !!}</p>
                            <form>

                                <div class="row">
                                    <div class="col-lg-9 d-flex flex-row pt-2">
                                        <div class="flex-grow-1 mx-2">
                                            <a href="https://wa.me/{{ appSetting()->phone }}?text=Halo%20saya%20ingin%20memesan%20{{ $data->name }}%20dari%20{{ appSetting()->name }}"
                                                class="btn btn-primary btn-icon btn-icon-start rounded w-100 flex-grow-1"><i
                                                    class="uil uil-shopping-bag"></i> Order Now</a>
                                        </div>

                                    </div>
                                    <!-- /column -->
                                </div>
                                <!-- /.row -->
                            </form>
                            <!-- /form -->
                        </div>
                        <!-- /column -->
                    </div>
                    <!-- /.row -->

                    <!-- /.nav-tabs -->

                    <!-- /.tab-content -->
                </div>
                <!-- /.container -->
            </section>
        </div>
    </section>
@endsection
