@extends('client.layout.main')
@section('content-client')
    <section class="wrapper bg-light">
        <div class="container pt-10 pt-md-14 pb-14 pb-md-16 text-center">
            <div class="row gx-lg-8 gx-xl-12 gy-10 gy-xl-0 mb-14 align-items-center">
                <div class="col-lg-7 order-lg-2">
                    <figure><img class="img-auto" src="client/cookie.png" srcset="client/cookie.png" alt="" /></figure>
                </div>
                <!-- /column -->
                <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-5 text-center text-lg-start">
                    <h1 class="display-1 fs-54 mb-5 mx-md-n5 mx-lg-0 mt-7">Quality is our priority <br
                            class="d-md-none"><span class="rotator-fade text-primary">Premium ingredients,Quality control
                            24/7,Hygienic 100%</span></h1>
                    <p class="lead fs-lg mb-7">We ensure that our products are of high quality and always deliver a
                        consistent taste at all times.</p>
                    <span><a class="btn btn-lg btn-primary rounded-pill me-2">Get Started</a></span>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <!-- /.row -->
        </div>
        <!-- /.container -->
        <div class="overflow-hidden">
            <div class="divider text-soft-primary mx-n2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
                    <path fill="currentColor"
                        d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
                </svg>
            </div>
        </div>
        <!-- /.overflow-hidden -->
    </section>
    <!-- /section -->
    <section class="wrapper bg-gradient-primary">
        <div class="container pt-12 pt-lg-8 pb-14 pb-md-17">
            <div class="row text-center">
                <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2 class="fs-16 text-uppercase text-primary mb-3">What We Do</h2>
                    <h3 class="display-3 mb-10 px-xxl-10">
                        We specialize in crafting delicious food products tailored to your needs.
                    </h3>
                </div>
                <!-- /column -->
            </div>
            <!-- /.row -->
            <div class="row gx-lg-8 gx-xl-12 gy-11 px-xxl-5 text-center d-flex align-items-end">
                <div class="col-lg-4">
                    <div class="px-md-15 px-lg-3">
                        <figure class="mb-6"><img class="img-fluid" src="client/img/illustrations/i24.png"
                                srcset="client/img/illustrations/i24@2x.png 2x" alt="" /></figure>
                        <h3>Product Development</h3>
                        <p class="mb-2">We create and innovate food products that not only taste great but also meet
                            modern health and lifestyle standards.</p>
                    </div>
                    <!--/.px -->
                </div>
                <!--/column -->
                <div class="col-lg-4">
                    <div class="px-md-15 px-lg-3">
                        <figure class="mb-6"><img class="img-fluid" src="client/img/illustrations/i19.png"
                                srcset="client/img/illustrations/i19@2x.png 2x" alt="" /></figure>
                        <h3>Branding & Packaging</h3>
                        <p class="mb-2">Our visual design team ensures your brand stands out through eye-catching
                            packaging and branding strategies.</p>
                    </div>
                    <!--/.px -->
                </div>
                <!--/column -->
                <div class="col-lg-4">
                    <div class="px-md-15 px-lg-3">
                        <figure class="mb-6"><img class="img-fluid" src="client/img/illustrations/i18.png"
                                srcset="client/img/illustrations/i18@2x.png 2x" alt="" /></figure>
                        <h3>Promotional Content</h3>
                        <p class="mb-2">We develop compelling visual content, including animations, to boost your product
                            marketing effectively.</p>
                    </div>
                    <!--/.px -->
                </div>
                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /section -->

    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row align-items-center mb-10 position-relative zindex-1">
                <div class="col-md-8 col-lg-9 col-xl-8 col-xxl-7 pe-xl-20">
                    <h2 class="display-6">Top Categories</h2>

                    <!-- /nav -->
                </div>
                <!--/column -->
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="grid grid-view projects-masonry shop mb-13">
                <div class="row gx-md-8 gy-10 gy-md-13 isotope">
                    @foreach ($cat as $item)
                        <div class="project item col-md-6 col-xl-4">
                            <figure class="rounded mb-6">
                                <img src="{{ asset('storage/assets/' . $item->image) }}"
                                    srcset="{{ asset('storage/assets/' . $item->image) }}" alt="" />
                                <a class="item-view" href="{{ url('category/' . $item->slug) }}"
                                    data-bs-toggle="white-tooltip" title="Quick view"><i class="uil uil-eye"></i></a>
                            </figure>
                            <div class="post-header">
                                <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                    <div class="post-category text-ash mb-0">Total {{ $item->products->count() }} Products
                                    </div>
                                </div>
                                <h2 class="post-title h3 fs-22"><a href="{{ url('category/' . $item->slug) }}"
                                        class="link-dark">{{ $item->name }}</a></h2>
                            </div>
                            <!-- /.post-header -->
                        </div>
                    @endforeach

                    <!-- /.item -->
                    <!-- /.item -->
                </div>
                <div class="text-center">

                    <span><a href="{{ url('categories') }}" class="btn btn-lg btn-primary rounded-pill me-2 mt-5">Load
                            More</a></span>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.grid -->

            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>

    <!-- /section -->
    <section class="wrapper bg-gradient-reverse-primary">
        <div class="container pb-14 pb-md-16">
            <div class="row gx-lg-8 gx-xl-12 gy-10 align-items-center">
                <div class="col-lg-7">
                    <figure><img class="img-auto" src="client/img/illustrations/i22.png"
                            srcset="client/img/illustrations/i22@2x.png 2x" alt="" /></figure>
                </div>
                <!--/column -->
                <div class="col-lg-5">
                    <div class="card shadow-lg me-lg-6">
                        <div class="card-body p-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                                            class="number">01</span></span>
                                </div>
                                <div>
                                    <h4 class="mb-1">Environmentally friendly materials</h4>
                                    <p class="mb-0">We use eco-friendly ingredients and packaging to reduce environmental
                                        impact.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-lg ms-lg-13 mt-6">
                        <div class="card-body p-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                                            class="number">02</span></span>
                                </div>
                                <div>
                                    <h4 class="mb-1">Recycled materials equipment</h4>
                                    <p class="mb-0">Our production equipment is built with recycled materials to support
                                        sustainability.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-lg mx-lg-6 mt-6">
                        <div class="card-body p-6">
                            <div class="d-flex flex-row">
                                <div>
                                    <span class="icon btn btn-circle btn-lg btn-soft-primary pe-none me-4"><span
                                            class="number">03</span></span>
                                </div>
                                <div>
                                    <h4 class="mb-1">Strict Quality Control</h4>
                                    <p class="mb-0">Every product goes through rigorous quality checks to ensure safety
                                        and freshness.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--/column -->
            </div>
            <!--/.row -->
        </div>
        <!-- /.container -->
        <div class="overflow-hidden">
            <div class="divider text-light mx-n2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
                    <path fill="currentColor"
                        d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
                </svg>
            </div>
        </div>
        <!-- /.overflow-hidden -->
    </section>
    <section class="wrapper bg-light">
        <div class="container py-14 py-md-16">
            <div class="row align-items-center mb-10 position-relative zindex-1">
                <div class="col-md-8 col-lg-9 col-xl-8 col-xxl-7 pe-xl-20">
                    <h2 class="display-6">New Arrivals</h2>
                    <p>New Products</p>

                    <!-- /nav -->
                </div>
                <!--/column -->
                <!--/column -->
            </div>
            <!--/.row -->
            <div class="grid grid-view projects-masonry shop mb-13">
                <div class="row gx-md-8 gy-10 gy-md-13 isotope">
                    @foreach ($prod as $item)
                        <div class="project item col-md-6 col-xl-4">
                            <figure class="rounded mb-6">
                                <img src="{{ asset('storage/assets/' . $item->image) }}"
                                    srcset="{{ asset('storage/assets/' . $item->image) }}" alt="" />
                                <a class="item-view" href="{{ url('product/' . $item->slug) }}"
                                    data-bs-toggle="white-tooltip" title="Quick view"><i class="uil uil-eye"></i></a>
                            </figure>
                            <div class="post-header">
                                <div class="d-flex flex-row align-items-center justify-content-between mb-2">
                                    <div class="post-category text-ash mb-0">{{ $item->categories->name }}</div>
                                    <span class="ratings five"></span>
                                </div>
                                <h2 class="post-title h3 fs-22"><a href="{{ url('product/' . $item->slug) }}"
                                        class="link-dark">{{ $item->name }}</a></h2>
                                <p class="price"><ins><span class="amount">{{ formatIDR($item->price) }}</span></ins>
                                </p>
                            </div>
                            <!-- /.post-header -->
                        </div>
                    @endforeach

                    <!-- /.item -->
                    <!-- /.item -->
                </div>
                <div class="text-center">

                    <span><a href="{{ url('products') }}" class="btn btn-lg btn-primary rounded-pill me-2 mt-5">Load
                            More</a></span>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.grid -->

            <!-- /nav -->
        </div>
        <!-- /.container -->
    </section>

    <!-- /section -->

    <!-- /section -->
    <!-- /section -->
    <section class="wrapper bg-light">
        <!-- /.container -->
        <div class="overflow-hidden">
            <div class="divider text-navy mx-n2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
                    <path fill="currentColor"
                        d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z" />
                </svg>
            </div>
        </div>
        <!-- /.overflow-hidden -->
    </section>
@endsection
