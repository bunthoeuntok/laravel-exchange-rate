<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset(System::system()->icon ?? '') }}">
    <title>{{ System::system()->name ?? config('app.name') }}</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <link href="{{ asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/switchery/switchery.min.css') }}" rel="stylesheet">
  
    <!-- Theme Styles -->
    <link href="{{ asset('css/concept.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="page-header-fixed page-sidebar-fixed">
    <div id="app">
        <!-- Page Content -->
        <div class="page-content">
            @include('layouts.partials.left-sidebar')
            <!-- Page Header -->
            @include('layouts.partials.top-header')
            <!-- Page Inner -->
            <div class="page-inner no-page-title">
                <div id="main-wrapper">
                    {{-- Page Header --}}
                    @yield('page-header')

                    {{-- Main conteent --}}
                    <main>
                        @yield('content')
                    </main>
                </div>

                
                {{-- <div class="page-footer">
                    <p>2019 &copy; stacks</p>
                </div> --}}
            </div>
            
            {{-- Right Sidebar --}}
            @include('layouts.partials.right-sidebar')
        </div>
    </div>

     <!-- Javascripts -->
    <script src="{{ asset('plugins/jquery/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('js/concept.min.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
