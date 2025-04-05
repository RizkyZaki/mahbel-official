<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.plugins._top')
</head>

<body class="">
    <div class="content-wrapper">
        @include('client.components._navbar')
        <!-- /header -->
        @yield('content-client')
        <!-- /section -->
    </div>
    @include('client.components._footer')
    <!-- /.content-wrapper -->

    {{--

  @yield('content-client')


  <a href="#" onclick="topFunction()" id="back-to-top" class="back-to-top fs-5"><i data-feather="arrow-up"
      class="fea icon-sm icons align-middle"></i></a>
  --}}
    @include('client.plugins._bottom')
</body>

</html>
