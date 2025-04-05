<footer class="bg-navy text-inverse">
    <div class="container pt-12 pt-lg-6 pb-13 pb-md-15">
        <div class="d-lg-flex flex-row align-items-lg-center">
            <h3 class="display-3 mb-6 mb-lg-0 pe-lg-20 pe-xl-22 pe-xxl-25 text-white">Experience delicious meals made
                just for you join now and satisfy your cravings!</h3>
            <a href="https://wa.me/{{ appSetting()->phone }}?text=Halo"
                class="btn btn-primary rounded-pill mb-0 text-nowrap">Order Now</a>
        </div>
        <!--/div -->
        <hr class="mt-11 mb-12" />
        <div class="row gy-6 gy-lg-0">
            <div class="col-md-4 col-lg-3">
                <div class="widget">
                    <img class="mb-4" src="./assets/img/logo-light.png" srcset="./assets/img/logo-light@2x.png 2x"
                        alt="" />
                    <p class="mb-4">© 2025 Mahbel. <br class="d-none d-lg-block" />All rights reserved.</p>
                    <nav class="nav social social-white">
                        <a href="{{ appSetting()->link_twitter }}"><i class="uil uil-twitter"></i></a>
                        <a href="{{ appSetting()->link_facebook }}"><i class="uil uil-facebook-f"></i></a>
                        <a href="{{ appSetting()->link_tiktok }}"><i class="uil uil-tiktok"></i></a>
                        <a href="{{ appSetting()->link_instagram }}"><i class="uil uil-instagram"></i></a>
                    </nav>
                    <!-- /.social -->
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-3">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">Get in Touch</h4>
                    <address class="pe-xl-15 pe-xxl-17">{{ appSetting()->address }}</address>
                    <a href="mailto:#">{{ appSetting()->email }}</a><br /> {{ appSetting()->phone }}
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->
            <div class="col-md-4 col-lg-3">
                <div class="widget">
                    <h4 class="widget-title text-white mb-3">More</h4>
                    <ul class="list-unstyled  mb-0">
                        @foreach (about() as $item)
                            <li><a href="{{ url('about/' . $item->slug) }}">{{ $item->title }}</a></li>
                        @endforeach

                    </ul>
                </div>
                <!-- /.widget -->
            </div>
            <!-- /column -->

            <!-- /column -->
        </div>
        <!--/.row -->
    </div>
    <!-- /.container -->
</footer>
