<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.plugins._top')

</head>


<body class="nk-body bg-white npc-default pg-error">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle wide-md mx-auto">
                        <div class="nk-block-content nk-error-ld text-center">
                            <img class="nk-error-gfx" src="{{ asset('client/404.png') }}" alt="">
                            <div class="wide-xs mx-auto">
                                <h3 class="nk-error-title">Oops! Mengapa anda di sini?</h3>
                                <p class="nk-error-text">Kami mohon maaf atas ketidaknyamanan ini. Sepertinya Anda
                                    mencoba mengakses
                                    suatu halaman
                                    yang telah dihapus atau tidak pernah ada.</p>
                                <a href="{{ url('/') }}" class="btn btn-lg btn-primary mt-2">Kembali</a>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    @include('admin.plugins._bottom')


</html>
