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
    <!-- <script src="{{ asset('js/navbar.js') }}" defer></script> -->
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
    <script src="{{ asset('js/upload-file.js') }}" defer></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/leaflet-rotatedmarker@0.2.0/leaflet.rotatedMarker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.js"></script> -->







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
    <!-- <link href="{{ asset('css/navbar.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/navbar-custom.css') }}" rel="stylesheet"> -->
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
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet' />
    <link href="{{ asset('css/notification.css') }}" rel="stylesheet">
    <link href="{{ asset('css/density-of-traffic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar-reskin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/upload-file.css') }}" rel="stylesheet">
    <link href="{{ asset('css/generate-report.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/resumablejs@1.1.0/resumable.min.js" rrel='stylesheet' />

    <!-- Favicon -->
    <link rel="icon" href="{{ url('images/favicon.png') }}">
</head>

<body class="sb-nav-fixed">
    @include('notify::components.notify')
    <x:notify-messages class="notification" />
    <div id="cover"></div>
    <div id="cover-2"></div>
    <div id="app">

        <body id="body-pd">
            <header class="header" id="header">
                <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
                @if(Auth::user()->has_image == false)
                <div class="header_img"> <a href="{{route('update-account')}}"><img src="{{ asset('images/default.jpeg') }}" alt="{{ Auth::user()->name}}" onerror="this.src='/images/default.jpeg';" class="profile-pic"></a></div>
                @else
                <div class="header_img"> <a href="{{route('update-account')}}"><img src="{{ asset('images/avatars/'.Auth::user()->avatar) }}" alt="{{ Auth::user()->name}}" onerror="this.src='/images/default.jpeg';" class="profile-pic"></a></div>
                @endif
            </header>
            <div class="l-navbar" id="nav-bar">
                <nav class="nav">
                    <div>
                        @if(Auth::user()->userType == "Admin")
                        <a href="{{route('admin.dashboard')}}" class="nav_logo">
                            @elseif(Auth::user()->userType == "Student")
                            <a href="{{route('student.dashboard')}}" class="nav_logo">
                                @else
                                <a href="{{route('public.dashboard')}}" class="nav_logo">
                                    @endif
                                    <i class='bx bxs-ship nav_logo-icon'></i>
                                    <span class="nav_logo-name">Marine App</span> </a>
                                <div class="nav_list">
                                    @if(Auth::user()->userType == "Admin")
                                    @if($active == 'admin.dashboard')
                                    <a href="{{route('admin.dashboard')}}" class="nav_link active">
                                        @else
                                        <a href="{{route('admin.dashboard')}}" class="nav_link">
                                            @endif
                                            <i class='bx bx-grid-alt nav_icon'></i>
                                            <span class="nav_name">Dashboard</span> </a>
                                        @if($active == 'admin.add_account')
                                        <a href="{{ route('admin.add-account') }}" class="nav_link active">
                                            @else
                                            <a href="{{ route('admin.add-account') }}" class="nav_link">
                                                @endif
                                                <i class='bx bx-user-plus nav_icon'></i>
                                                <span class="nav_name">Add Account</span> </a>
                                            @elseif(Auth::user()->userType == "Student")
                                            @if($active == 'student.dashboard')
                                            <a href="{{route('student.dashboard')}}" class="nav_link active">
                                                @else
                                                <a href="{{route('student.dashboard')}}" class="nav_link">
                                                    @endif
                                                    <i class='bx bx-grid-alt nav_icon'></i>
                                                    <span class="nav_name">Dashboard</span> </a>
                                                @if($active == 'student.upload_file')
                                                <a href="{{route('student.upload-file')}}" class="nav_link active">
                                                    @else
                                                    <a href="{{route('student.upload-file')}}" class="nav_link">
                                                        @endif
                                                        <i class='bx bxs-report nav_icon'></i>
                                                        <span class="nav_name">Generate Report</span> </a>
                                                    @else
                                                    @if($active == 'public.dashboard')
                                                    <a href="{{route('public.dashboard')}}" class="nav_link active">
                                                        @else
                                                        <a href="{{route('public.dashboard')}}" class="nav_link">
                                                            @endif
                                                            <i class='bx bx-grid-alt nav_icon'></i>
                                                            <span class="nav_name">Dashboard</span> </a>
                                                        @if($active == 'public.density_of_traffic')
                                                        <a href="{{route('public.density-of-traffic')}}" class="nav_link active">
                                                            @else
                                                            <a href="{{route('public.density-of-traffic')}}" class="nav_link">
                                                                @endif
                                                                <i class='bx bx-map-alt nav_icon' id="density-of-traffic"></i>
                                                                <span class="nav_name">Density Of Traffic</span> </a>
                                                            @if($active == 'public.vessel_details')
                                                            <a href="{{route('public.vessel-details')}}" class="nav_link active">
                                                                @else
                                                                <a href="{{route('public.vessel-details')}}" class="nav_link">
                                                                    @endif
                                                                    <i class='bx bx-detail nav_icon'></i>
                                                                    <span class="nav_name">Vessel Details</span> </a>
                                                                @endif
                                                                @if($active == 'update_account')
                                                                <a href="{{ route('update-account') }}" class="nav_link active">
                                                                    @else
                                                                    <a href="{{ route('update-account') }}" class="nav_link">
                                                                        @endif
                                                                        <i class='bx bx-user nav_icon'></i>
                                                                        <span class="nav_name">Update Account</span> </a>

                                </div>
                    </div>
                    <a href="{{ route('logout') }}" class="nav_link">
                        <i class='bx bx-log-out nav_icon' onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"></i> <span class="nav_name">Logout</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                            @csrf
                        </form>
                    </a>
                </nav>
            </div>
            <!--Container Main start-->
            <div class="height-100 bg-light">
                @yield('content')
            </div>
            <!--Container Main end-->
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
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
                searchPlaceholder: 'Search Data'
            },
            "info": false,
            "scrollY": "30rem",
        });

        $('#datatablesSimple').setRowHeight(8);
    </script>
    @notifyJs
    <script src="{{ asset('js/navbar-reskin.js') }}" defer></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>




</body>

</html>