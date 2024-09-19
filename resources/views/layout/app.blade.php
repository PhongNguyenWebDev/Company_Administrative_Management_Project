<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <!-- App title -->
    <title>Zircos - Responsive Admin Dashboard Template</title>
    <!--Morris Chart CSS -->
    <!-- App css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}"> --}}
    {{-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('assets/css/index.css') }}">
    <link href="{{ asset('assets/css/core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/components.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/switchery/switchery.min.css') }}">
</head>

<body class="fixed-left">
    <!-- Loader -->
    @include('admin.block.load-page')
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        @include('admin.block.header')
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->
        @include('admin.block.vertical-menu')
        <!-- Left Sidebar End -->
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- End content -->
            {{-- Footer --}}
            @include('admin.block.footer')
        </div>
        <!-- /Right-bar -->
    </div>
    <!-- END wrapper -->
    <script>
        var resizefunc = [];
    </script>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script src="{{ asset('assets/js/detect.js') }}"></script>
    <script src="{{ asset('assets/js/fastclick.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
    <!-- Counter js -->
    <script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <!--Morris Chart-->
    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/morris.js@0.5.1/dist/morris.min.js"></script>
    <!-- Include Morris.js -->

    <!-- Dashboard init -->
    <script src="{{ asset('assets/pages/jquery.dashboard.js') }}"></script>
    <!-- App js -->
    <script src="{{ asset('assets/js/jquery.core.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.app.js') }}"></script>
</body>

</html>
