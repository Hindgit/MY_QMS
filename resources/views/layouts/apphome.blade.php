<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Web-server-ui Nextronic</title>

   <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
     <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <!--Icon Update Delete -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- flatpicker-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="../../plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar" style="height: 70px;">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar" >

                <!-- User Info -->
            <div class="user-info">
                <div class="image" style="margin-left: 20px;">
                    <img src="{{ asset('storage/images/' .Auth::user()->photo) }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></div>
                    <div class="email">{{ Auth::user()->email }}</div>
                </div>
               <ul class="navbar-nav ml-auto" style="margin-left: 71px; margin-top: 32px;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
            </div>

            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="/home">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    <li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">supervisor_account</i>
                            <span>Users</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="users">
                                    <i class="material-icons" style="font-size: 20px;">people</i>
                                        <p style="margin-left: 10px; font-size: 19px;">All</p>
                                </a>
                                <a href="createuser">
                                    <i class="material-icons" style="font-size: 20px;">group_add</i>
                                        <p style="margin-left: 10px; font-size: 19px;">Create Users</p>
                                </a>
                            </li>
                        </ul>
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">donut_small</i>
                            <span>Services</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="services">
                                    <i class="material-icons" style="font-size: 20px;">donut_small</i>
                                        <p style="margin-left: 10px; font-size: 19px;">All Services</p>
                                </a>
                                <a href="service">
                                    <i class="material-icons" style="font-size: 20px;">add_circle</i>
                                        <p style="margin-left: 10px; font-size: 19px;">Ajouter Service</p>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">album</i>
                            <span>Offices</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="officess">
                                    <i class="material-icons" style="font-size: 20px;">album</i>
                                        <p style="margin-left: 10px; font-size: 19px;">All Offices</p>
                                </a>
                                <a href="offices">
                                    <i class="material-icons" style="font-size: 20px;">add_circle</i>
                                        <p style="margin-left: 10px; font-size: 19px;">Ajouter Offices</p>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">group_work</i>
                            <span>Display</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="displays">
                                    <i class="material-icons" style="font-size: 20px;">group_work</i>
                                        <p style="margin-left: 10px; font-size: 19px;">All Display</p>
                                </a>
                                <a href="display">
                                    <i class="material-icons" style="font-size: 20px;">add_circle</i>
                                        <p style="margin-left: 10px; font-size: 19px;">Ajouter Display</p>
                                </a>
                            </li>
                        </ul>

                    <li>
                    <li>
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">devices</i>
                            <span>Console</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="consoles">
                                    <i class="material-icons" style="font-size: 20px;">devices</i>
                                        <p style="margin-left: 10px; font-size: 19px;">All Consoles</p>
                                </a>
                                <a href="console">
                                    <i class="material-icons" style="font-size: 20px;">add_circle</i>
                                        <p style="margin-left: 10px; font-size: 19px;">Ajouter Console</p>
                                </a>
                            </li>
                        </ul>

                    <li>
                    <li>
                        <a href="statistique">
                                <i class="material-icons">timeline</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="google-line-chart">
                            <i class="material-icons">timeline</i>
                            <span>Statistic Office</span>
                            </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
            <footer>
                <div class="copyright pull-right">
                    &copy; {{ env('DEV_YEAR', '2020') }}, Developed  with <i class="material-icons" style="font-size: 13px;color:red">favorite</i> by <a href="http://nextronic.io/startup/">{{ env('DEV_NAME', 'Nextronic') }}</a>
                </div>
            </footer>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>

    @yield('content')

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <!--<script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>-->

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../../plugins/raphael/raphael.min.js"></script>
    <script src="../../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../../plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="../../plugins/flot-charts/jquery.flot.js"></script>
    <script src="../../plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="../../plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="../../plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="../../plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
</body>

</html>
