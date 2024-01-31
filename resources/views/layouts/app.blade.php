<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{ route('dashboard.index') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('images/logo.png') }}" alt="" />
                <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="" />
                <span class="brand-title">M-Chain</span>
                {{-- <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="" /> --}}
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            {{-- <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search" />
                                    </form>
                                </div>
                            </div> --}}
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                    <span>{{ Auth::user()->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    {{-- <a href="./app-profile.html" class="dropdown-item">
                                        <i class="fa fa-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a> --}}
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <i class="icon-key"></i>
                                        <button class="btn btn-primary form-control" type="submit">Logout</button>
                                    </form>


                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    @if (Auth::user()->role == 'admin')
                        <li class="nav-label first">Inventori Management</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                    class="icon icon-single-04"></i><span class="nav-text">Stock</span></a>
                            <ul aria-expanded="false">
                                <li><a href="{{ route('inputdata.index') }}">Input Data</a></li>
                                <li><a href="{{ route('inventory.index') }}">Inventori</a></li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-label first">Request Management</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="icon icon-single-04"></i><span class="nav-text">Request</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('requestmaterial.index') }}">Request Material</a></li>
                            @if (Auth::user()->role == 'admin')
                                <li><a href="{{ route('verification.index') }}">Verification</a></li>
                            @endif
                            <li><a href="{{ route('history.index') }}">History</a></li>
                        </ul>
                    </li>
                    <li class="nav-label first">Management Role</li>
                    <li><a href="{{ route('managementrole.index') }}">Management Role</a></li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        @yield('content')
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>
                    Copyright © Designed &amp; Developed by
                    <a href="#" target="_blank">LagiNgoding</a> 2024
                </p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    @include('components.js')
</body>

</html>
