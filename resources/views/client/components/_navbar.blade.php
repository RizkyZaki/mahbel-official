<header class="position-absolute w-100">

    <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
        <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('storage/assets/site/logo/' . appSetting()->logo) }}"
                        srcset="{{ asset('storage/assets/site/logo/' . appSetting()->logo) }}" width="80"
                        alt="" />
                </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                <div class="offcanvas-header d-lg-none">
                    <h3 class="text-white fs-30 mb-0">Mahbel Nugraha Langgeng Iff</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('/') ? 'active' : '' }}"
                                href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0);"
                                data-bs-toggle="dropdown">About</a>
                            <ul class="dropdown-menu">
                                @foreach (about() as $item)
                                    <li class="nav-item"><a class="dropdown-item"
                                            href="{{ url('about/' . $item->slug) }}">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('location') ? 'active' : '' }}"
                                href="{{ url('location') }}">Location</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('products') ? 'active' : '' }}"
                                href="{{ url('products') }}">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('contact') ? 'active' : '' }}"
                                href="{{ url('contact') }}">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  {{ Request::is('carrier') ? 'active' : '' }}"
                                href="{{ url('carrier') }}">Carrier</a>
                        </li>


                        {{-- @if (Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{ url('logout') }}"><i class='uil uil-arrow-left'></i>
                    Logout</a></li>
                <li class="nav-item d-lg-none">
                @else
                <li class="nav-item"><a class="nav-link" href="{{ url('login') }}"><i class='uil uil-arrow-right'></i>
                    Masuk</a></li>
              @endif --}}

                    </ul>
                    <!-- /.navbar-nav -->
                    <div class="offcanvas-footer d-lg-none">
                        <div>
                            <a href="mailto:first.last@email.com" class="link-inverse">{{ appSetting()->email }}</a>
                            <br /> {{ appSetting()->phone }}<br />

                            <!-- /.social -->
                        </div>
                    </div>
                    <!-- /.offcanvas-footer -->
                </div>
                <!-- /.offcanvas-body -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other ms-lg-4">
                <ul class="navbar-nav flex-row align-items-center ms-auto">

                    <li class="nav-item d-lg-none">
                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                    </li>
                </ul>
                <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.navbar -->
</header>
