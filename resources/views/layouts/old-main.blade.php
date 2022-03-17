<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous" defer></script>
    <script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/navbar.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" defer></script>
    <script src="https://kit.fontawesome.com/25adcc2111.js" crossorigin="anonymous" defer></script>
    <script src="{{ asset('js/image-preview.js') }}" defer></script>
    <script src="{{ asset('js/custom-datatable.js') }}" defer></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js" defer></script>
    <script src="{{ asset('js/dropzone.js') }}" defer></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js" defer></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js" defer></script>
    <script src="{{ asset('js/loading.js') }}" defer></script>
    <script src="{{ asset('js/modal.js') }}" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous" />
    <link href="{{ asset('assets/css/atlantis.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar-custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/add-account.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <!-- <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css" />
    <link href="{{ asset('css/loading.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <link href="{{ asset('css/student-dashboard.css') }}" rel="stylesheet">
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
    @notifyCss
    <link href="{{ asset('css/notification.css') }}" rel="stylesheet">
    <link href="{{ asset('css/density-of-traffic.css') }}" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="{{ url('images/favicon.png') }}">
</head>

<body class="sb-nav-fixed">
    @include('notify::components.notify')
    <x:notify-messages  class="notification"/>
    <div id="cover"></div>
    <div id="app">
        <nav class="sb-topnav navbar navbar-expand navbarColor">
            <!-- Navbar Brand-->
            @if(Auth::user()->userType == "Admin")
            <a class="navbar-brand ps-3 no-link-color" href="{{route('admin.dashboard')}}">{{ config('app.name') }}</a>
            @elseif(Auth::user()->userType == "Student")
            <a class="navbar-brand ps-3 no-link-color" href="{{route('student.dashboard')}}">{{ config('app.name') }}</a>
            @else
            <a class="navbar-brand ps-3 no-link-color" href="{{route('public.dashboard')}}">{{ config('app.name') }}</a>
            @endif
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 no-link-color" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">


                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4 navbar-container">

                @if(Auth::user()->has_image == false)
                <a href="{{route('update-account')}}"><img src="{{ asset('images/default.jpeg') }}" alt="{{ Auth::user()->name}}" onerror="this.src='/images/default.jpeg';" class="profile-pic"></a>
                @else
                <a href="{{route('update-account')}}"><img src="{{ asset('images/avatars/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->name}}" onerror="this.src='/images/default.jpeg';" class="profile-pic"></a>
                @endif

                <a href="{{ route('logout') }}" class="logout" role="button"><i class="fas fa-sign-out-alt" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"></i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark navbarColor" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">

                            @if(Auth::user()->userType == "Admin")
                            <a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a>
                            <a class="nav-link" href="{{ route('admin.add-account') }}">Add Account</a>
                            @elseif(Auth::user()->userType == "Student")
                            <a class="nav-link" href="{{route('student.dashboard')}}">Dashboard</a>
                            <a class="nav-link" href="{{route('student.upload-file')}}">Generate Report</a>
                            @else
                            <a class="nav-link" href="{{route('public.dashboard')}}">Dashboard</a>
                            <a class="nav-link" href="{{route('public.density-of-traffic')}}">Density of Traffic</a>
                            <a class="nav-link" href="{{route('public.vessel-details')}}">Vessel Details</a>
                            @endif

                            <a class="nav-link" href="{{ route('update-account') }}">Update Account</a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer navbarColor-footer">
                        <div class="small">Logged in as:</div>
                        {{ Auth::user()->userName }}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('assets/js/plugin/datatables/datatables.min.js')}}"></script>
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
        <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
        <script>
            $('#datatablesSimple').DataTable({
                "lengthMenu": [8],
                "lengthChange": false,
                language: {
                    search: '<i class="fa fa-search fa-lg theme-icon"></i>',
                    searchPlaceholder: 'Search Users'
                },
                "info": false,
                "scrollY": "30rem",
            });

            $('#datatablesSimple').setRowHeight(8);
        </script>
        @notifyJs


</body>

</html>