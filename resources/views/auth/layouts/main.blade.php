<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin Pabuaran Kidul</title>
        <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
        <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">
        <link href="{{ asset("template/vendor/datatables/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body id="page-top">
        <div id="wrapper">
            @include('auth.layouts.sidebar')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                @include('auth.layouts.nav')
                    <div class="container-fluid">
                        <h1 class="h3 mb-4 text-gray-800">@yield("title-header")</h1>
                        @yield('main')
                    </div>
                </div>
                @include('auth.layouts.footer')
            </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>
        <script src="{{ asset("template/vendor/datatables/jquery.dataTables.min.js") }}"></script>
        <script src="{{ asset("template/vendor/datatables/dataTables.bootstrap4.min.js") }}"></script>
        <script src="{{ asset("template/js/demo/datatables-demo.js") }}"></script>
        @stack('scripts')
    </body>
</html>