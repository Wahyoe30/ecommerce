{{-- <!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'ECommerce')</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Font Awesome CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    </head>
    <body>
        <div class="container-fluid">
            <nav class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <a class="navbar-brand d-flex align-items-center justify-content-center py-3" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" class="logo">
                    </a>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home')}}" aria-current="page" href="{{ route('home') }}">
                                <i class="fas fa-home"></i>
                                Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('categories.index')}}" aria-current="page" href="{{ route('categories.index') }}">
                                <i class="fas fa-list"></i>
                                Kategori
                            </a>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('produk.index') ? 'active' : '' }}" aria-current="page" href="{{ route('produk.index') }}">
                                <i class="fas fa-box-open"></i>
                                Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('favorits.index') ? 'active' : '' }}" aria-current="page" href="{{ route('favorits.index') }}">
                                <i class="fas fa-heart"></i>
                                Favorite
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('orders.index') ? 'active' : '' }}" aria-current="page" href="{{ route('orders.index') }}">
                                <i class="fas fa-receipt"></i>
                                Orderan
                            </a>
                        </li>
                        <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('transactions.index') ? 'active' : '' }}" aria-current="page" href="{{ route('transactions.index') }}">
            <i class="fas fa-wallet"></i> <!-- Menggunakan ikon dompet -->
            Keuangan
        </a>
        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}" aria-current="page" href="{{ route('user.index') }}">
                                <i class="fas fa-users"></i>
                                User
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li> --}}
                    {{-- </ul> --}}
                {{-- </div> --}}
            {{-- </nav> --}}
            {{-- <div class="content">
                @yield('content')
            </div>
        </div> --}}

        <!-- jQuery dan Bootstrap Bundle (termasuk Popper) -->
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.header')

    @stack('customcss')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.nav')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    {{-- <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout.destroy') }}">Logout</a>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assetdashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assetdashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assetdashboard/js/sb-admin-2.min.js') }}"></script>
    @stack('customjs')
</body>

</html>
