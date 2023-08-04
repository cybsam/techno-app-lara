<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title') - Techno Apogee</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/dataTable.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('dataTable/css/addons/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dataTable/css/addons/datatables-select.min.css') }}">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet"> --}}

</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="{{ route('logout') }}"
                        role="button"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <p>{{ __('Logout') }}</p>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('Administrator.index') }}" class="brand-link">
                <img src="{{ asset('image/FrontEnd/logoFav/logo.png') }}" alt="logo" class="brand-image"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{ _('CybSam') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('image/users') }}/{{ Auth::user()->user_image }}" class="img-circle elevation-4" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            @if (Auth::check())
                                {{ auth::user()->name }}
                                
                            @endif

                        </a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{ route('Administrator.index') }}"
                            
                                class="nav-link @if (url()->current() == route('Administrator.index')) active @endif">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href=""
                                class="nav-link @if (url()->current() == route('Administrator.index')) active @endif">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Our Team
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Administrator.ListUsers') }}"
                                class="nav-link @if (url()->current() == route('Administrator.ListUsers')) active @endif">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>
                                    All Users
                                </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('homebanner.index') }}"
                                class="nav-link @if (url()->current() == route('homebanner.index')) active @endif ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Home Banner
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about.index') }}"
                                class="nav-link @if (url()->current() == route('about.index')) active @endif ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    About
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('feature.index') }}"
                                class="nav-link @if (url()->current() == route('feature.index')) active @endif ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Feature
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('address.index') }}"
                                class="nav-link @if (url()->current() == route('address.index')) active @endif ">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Address
                                </p>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>
                            </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a
                                        href="{{ route('Administrator.index') }}">Dashboard</a></li>
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">


                @if ($errors->any())
                    <div class="alert alert-danger col-6 offset-3">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success col-6 offset-3">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <ul>
                            <li>{{ session('status') }}</li>
                        </ul>
                    </div>
                @endif


                @yield('content')


            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">

                <b>Laravel v</b>{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
            
            <strong>&copy; 2006-{{ now()->year }} <a href="{{ route('frontEndIndex') }}">Techno Apogee Limited </a>
                | </strong> All rights reserved ~ Developed By <a href="https://github.com/cybsam" target="_blank">CybSam</a>

        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js') }}"></script> --}}
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('js/demo.js') }}"></script> --}}
    {{-- <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script> --}}
    {{-- <script src="{{ asset('js/dataTable.js') }}"></script>
    <script src="{{ asset('js/dataTable.bootstrap.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script> --}}
    <script src="{{ asset('dataTable/js/addons/datatables.min.js') }}"></script>
    <script src="{{ asset('dataTable/js/addons/datatables-select.min.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    @yield('js')
</body>

</html>
