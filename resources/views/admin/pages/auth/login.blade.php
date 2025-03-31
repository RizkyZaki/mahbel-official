<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.plugins._top')
    <style>
        .bg-login {
            background-color: #ffffff;
            background-image: linear-gradient(315deg, #ffffff 0%, #d7e1ec 74%);
        }

        .btn-login {
            background-color: #1D1755;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .logo-img-lg {
            max-height: 110px;
        }

        .bg-abstract {
            background-image: linear-gradient(to right, #08061a calc(60% - 150px), #0e0a29 calc(60% - 150px), #140f3d 60%, #1b1556 60%, #221a69 calc(60% + 150px), #271e7a calc(60% + 150px), #251b80 100%);
        }

        @import url(https://fonts.googleapis.com/css?family=Roboto:500);

        .google-btn {
            width: 220px;
            height: 42px;
            background-color: #4285f4;
            border-radius: 2px;
            box-shadow: 0 3px 4px 0 rgba(0, 0, 0, .25);
        }

        .google-btn .google-icon-wrapper {
            position: absolute;
            margin-top: 1px;
            margin-left: 1px;
            width: 40px;
            height: 40px;
            border-radius: 2px;
            background-color: #fff;
        }

        .google-btn .google-icon {
            position: absolute;
            margin-top: 11px;
            margin-left: 11px;
            width: 18px;
            height: 18px;
        }

        .google-btn .btn-text {
            float: right;
            margin: 11px 11px 0 0;
            color: #fff;
            font-size: 14px;
            letter-spacing: 0.2px;
            font-family: "Roboto";
        }

        .google-btn:hover {
            box-shadow: 0 0 6px #4285f4;
        }

        .google-btn:active {
            background: #1669f2;
        }
    </style>
</head>


<body class="nk-body npc-crypto bg-white pg-auth">
    <!-- app body @s -->
    <div class="nk-app-root">
        <div class="nk-split nk-split-page nk-split-lg">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container bg-white w-lg-45">
                <div class="absolute-top-right d-lg-none p-3 p-sm-5">
                    <a href="#" class="toggle btn btn-white btn-icon btn-light" data-target="athPromo"><em
                            class="icon ni ni-info"></em></a>
                </div>
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="brand-logo pb-3">
                        <a href="{{ url('/') }}" class="logo-link">
                            <img class="logo-img logo-img-lg"
                                src="{{ asset('storage/assets/site/logo/' . appSetting()->logo) }}"
                                srcset="{{ asset('storage/assets/site/logo/' . appSetting()->logo) }}" alt="logo">
                        </a>
                    </div>
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="nk-block-title">Masuk</h5>
                            <div class="nk-block-des">
                                <p>Akses Panel Admin Menggunakan email dan kata sandi
                                    kamu.</p>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <form>

                        <div class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control form-control-lg" id="email"
                                    placeholder="Masukkan Email...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-label-group">
                                <label class="form-label" for="password">Kata Sandi</label>

                            </div>
                            <div class="form-control-wrap">
                                <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg"
                                    data-target="password">
                                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                </a>
                                <input type="password" class="form-control form-control-lg" id="password"
                                    placeholder="Masukkan Kata Sandi...">
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn login btn-lg btn-dark btn-block">
                                <div class="spinner-border visually-hidden" role="status"></div>Masuk
                            </button>
                        </div>
                    </form><!-- form -->

                </div><!-- .nk-block -->

                <div class="nk-block nk-auth-footer">
                    <div class="mt-3">
                        <p>&copy; {{ date('Y') }} Mahbel Official</p>
                    </div>
                </div>
            </div><!-- nk-split-content -->
            <div class="nk-split-content nk-split-stretch bg-abstract">

            </div><!-- nk-split-content -->
        </div><!-- nk-split -->
    </div><!-- app body @e -->
    <!-- JavaScript -->

    <!-- select region modal -->

</body>
@include('admin.plugins._bottom')
<script>
    let csrfToken = $('meta[name="csrf-token"]').attr('content');
</script>
<script src="{{ asset('custom/js/auth/login.js') }}"></script>

</html>
