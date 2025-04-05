@extends('client.layout.main')
@section('content-client')
    <section class="wrapper image-wrapper bg-soft-primary ">
        <div class="container py-14 py-md-16 text-center">
            <div class="row">
                <div class="col-md-9 col-lg-7 col-xl-7 mx-auto text-center">

                    <h2 class="display-4 mb-3">Products</h2>

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
            <h2 class="display-4 mb-3">All Products</h2>
            <div class="grid grid-view projects-masonry shop mb-13">
                <div class="row gx-md-8 gy-10 gy-md-13 isotope">
                    @foreach ($collection as $item)
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
                <!-- /.row -->
            </div>
        </div>
    </section>
@endsection
