<div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="javascript:void(0);" class="logo-link nk-sidebar-logo" style="margin-top: 15px">
                <span class="logo-dark logo-img">
                    <h4><img class="aling-logo-landscape"
                            src="{{ asset('storage/assets/site/logo/' . appSetting()->logo) }}"></h4>
                </span>
                <span class="logo-small logo-img logo-img-small">
                    <h4><img class="aling-logo-small"
                            src="{{ asset('storage/assets/site/logo/' . appSetting()->logo) }}"></h4>
                </span>
            </a>
        </div>
        <div class="nk-menu-trigger me-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em
                    class="icon ni ni-arrow-left"></em></a>
            <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex"
                data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Dashboard</h6>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ url('dashboard/overview') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-home-alt"></em></span>
                            <span class="nk-menu-text">Overview</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Master</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('dashboard/categories') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-tags"></em></span>
                            <span class="nk-menu-text">Kategori</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('dashboard/products') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-bag"></em></span>
                            <span class="nk-menu-text">Produk</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('dashboard/about') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-line-chart-up"></em></span>
                            <span class="nk-menu-text">Tentang Perusahaan</span>
                        </a>
                    </li>
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Extra</h6>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('dashboard/contacts') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-call"></em></span>
                            <span class="nk-menu-text">Kontak</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ url('dashboard/settings') }}" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting-fill"></em></span>
                            <span class="nk-menu-text">Settings</span>
                        </a>
                    </li>
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
