<meta charset="utf-8" />
<title>{{ $title }} - {{ appSetting()->title }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="{{ appSetting()->description }}" />
<meta name="keywords" content="{{ appSetting()->keyword }}" />
<meta name="author" content="Buildify Corporation" />
<meta name="email" content="{{ appSetting()->email }}" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" href="{{ asset('storage/assets/site/logo/' . appSetting()->logo) }}">
<link rel="stylesheet" href="{{ asset('client/css/plugins.css') }}">
<link rel="stylesheet" href="{{ asset('client/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('client/css/colors/grape.css') }}">
<link rel="preload" href="{{ asset('client/css/fonts/space.css') }}" as="style" onload="this.rel='stylesheet'">
<style>
    #topnav {
        backdrop-filter: blur(5px) !important;
        background-color: rgba(255, 255, 255, .15) !important;
    }

    .card-title {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .img-adjust {
        max-height: 200px;
        object-fit: cover;
    }

    .img-figure {
        /* width: 450px */
        height: 230px;
        object-fit: cover;
    }

    .img-adjust-gallery {
        width: 356px;
        height: 250px;
        object-fit: cover;
    }

    .judul {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>
