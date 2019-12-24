<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Team Naufal dan Nur Iman">

    <!-- Title Page-->
    <title>@yield("title")</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset("css/font-face.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/font-awesome-4.7/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/font-awesome-5/css/fontawesome-all.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/mdi-font/css/material-design-iconic-font.min.css") }}" rel="stylesheet">

    <!-- Bootstrap CSS-->
    <link href="{{ asset("vendors/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Vendors CSS-->
    <link href="{{ asset("vendors/animsition/animsition.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/bootstrap-progressbar/bootstrap-progressbar.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/wow/animate.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/css-hamburgers/hamburgers.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/slick/slick.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/select2/css/select2.min.css") }}" rel="stylesheet">
    <link href="{{ asset("vendors/perfect-scrollbar/perfect-scrollbar.css") }}" rel="stylesheet">

    <!-- Main CSS-->
    <link href="{{ asset("css/theme.css") }}" rel="stylesheet">

    
    {{-- Scripts --}}
    <!-- Jquery JS-->
    <script src="{{ asset("vendors/jquery/jquery.min.js") }}"></script>

    <!-- Bootstrap JS-->
    <script src="{{ asset("vendors/popper/popper.min.js") }}"></script>
    <script src="{{ asset("vendors/bootstrap/js/bootstrap.min.js") }}"></script>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    {{-- <img src="{{ asset("img/icon/logo-white.png") }}" alt="Cool Admin" /> --}}
                    Logo SMKN 2 Bandung
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="{{ asset("img/icon/avatar-big-01.jpg") }}" alt="John Doe" />
                    </div>
                    <h4 class="name">{{ Auth::user()->name }}</h4>
                    {{-- <a href="#">Sign out</a> --}}
                    <a href="#"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        Log out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                            <a class="js-arrow" href="{{ route("admin.index") }}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard
                            </a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-users"></i>Anggota
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list" @if (request()->is('anggota*')) style="display:block;" @endif>
                                <li class="{{ (request()->is('anggota')) ? "active" : '' }}">
                                    <a href="{{ route("anggota.index") }}">
                                        <i class="fa fa-users"></i>Daftar Anggota</a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-users"></i>Daftar Wali Kelas</a>
                                </li>
                                <li>
                                    <a href="">
                                        <i class="fa fa-users"></i>Kelola Kelas</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="js-arrow" href="#">
                                <i class="fas fa-book"></i>Buku</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-file-alt"></i>Laporan
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="#">
                                        <i class="fas fa-table"></i>Anggota</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="{{ asset("img/icon/logo-white.png") }}" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                                <div class="setting-menu js-right-sidebar d-none d-lg-block">
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-account"></i>Account</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="#">
                                                <i class="zmdi zmdi-close"></i>Log Out</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <div class="account2">
                        <div class="image img-cir img-120">
                            <img src="{{ asset("img/icon/avatar-big-01.jpg") }}" alt="John Doe" />
                        </div>
                        <h4 class="name">{{ Auth::user()->name }}</h4>
                        {{-- <a href="#">Sign out</a> --}}
                        <a href="#"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Log out
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form> 
                    </div>
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <li class="{{ (request()->is('dashboard')) ? 'active' : '' }}">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-tachometer-alt"></i>Dashboard
                                </a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-users"></i>Anggota
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="">
                                            <i class="fa fa-users"></i>Daftar Anggota</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-users"></i>Daftar Wali Kelas</a>
                                    </li>
                                    <li>
                                        <a href="">
                                            <i class="fa fa-users"></i>Kelola Kelas</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-book"></i>Buku</a>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-file-alt"></i>Laporan
                                    <span class="arrow">
                                        <i class="fas fa-angle-down"></i>
                                    </span>
                                </a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                    <li>
                                        <a href="#">
                                            <i class="fas fa-table"></i>Anggota</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>
        <!-- END HEADER DESKTOP-->

        <!-- BREADCRUMB-->
            <section class="au-breadcrumb m-t-75">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="au-breadcrumb-content">
                                    <div class="au-breadcrumb-left">
                                        <span class="au-breadcrumb-span">You are here:</span>
                                        <ul class="list-unstyled list-inline au-breadcrumb__list">
                                            <li class="list-inline-item active">
                                                <a href="#">Home</a>
                                            </li>
                                            @foreach (Request::segments() as $segment)
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            {{-- <li class="list-inline-item">Dashboard</li> --}}
                                                <li class="list-inline-item separate">
                                                    {{ ucfirst($segment)     }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <!-- END BREADCRUMB-->

        @yield('content')
    </div>

    <!-- vendors JS       -->
    <script src="{{ asset("vendors/animsition/animsition.min.js") }}"></script>
    <script src="{{ asset("vendors/slick/slick.min.js") }}">
    </script>
    <script src="{{ asset("vendors/wow/wow.min.js") }}"></script>
    <script src="{{ asset("vendors/bootstrap-progressbar/bootstrap-progressbar.min.js") }}">
    </script>
    <script src="{{ asset("vendors/counter-up/jquery.waypoints.min.js") }}"></script>
    <script src="{{ asset("vendors/counter-up/jquery.counterup.min.js") }}">
    </script>
    <script src="{{ asset("vendors/circle-progress/circle-progress.min.js") }}"></script>
    <script src="{{ asset("vendors/perfect-scrollbar/perfect-scrollbar.js") }}"></script>
    <script src="{{ asset("vendors/chartjs/Chart.bundle.min.js") }}"></script>
    <script src="{{ asset("vendors/select2/js/select2.min.js") }}">
    </script>

    <!-- Main JS-->
    <script src="{{ asset("js/main.js") }}"></script>

    <script>
        $("#check-pinjam").on("change", function(){
            var checked = $(this).find(":checked").val();
            // console.log(checked);
            if(checked == "anggota") {
                $("#table-murid").slideUp();
                $("#table-anggota").slideDown();
            }else{
                $("#table-murid").slideDown();
                $("#table-anggota").slideUp();
            }
        });
    </script>
</body>

</html>
<!-- end document-->
