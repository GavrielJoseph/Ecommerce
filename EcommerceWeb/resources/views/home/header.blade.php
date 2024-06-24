<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Judul halaman -->
    <title>Header Section</title>
    <!-- Menghubungkan dengan stylesheet eksternal -->
    <link rel="stylesheet" href="css/web.css">
</head>
<body>

<!-- Bagian header -->
<header class="header_section">
    <div class="container">
        <!-- Navbar dengan menu navigasi -->
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <!-- Logo atau nama situs -->
            <a class="navbar-brand" href="{{url('/')}}">GM</a>
            <!-- Tombol toggle untuk menu navigasi di perangkat mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <!-- Daftar menu navigasi -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- Menu navigasi Home -->
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <!-- Menu navigasi Cart -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
                    </li>
                    <!-- Menu navigasi Order -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('show_order')}}">Order</a>
                    </li>
                    <!-- Form pencarian -->
                    <form class="form-inline">
                        <button class="btn my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    <!-- Pengecekan status login -->
                    @if (Route::has('login'))
                        @auth
                            <!-- Menu jika sudah login -->
                            <li class="nav-item">
                                <x-app-layout></x-app-layout>
                            </li>
                        @else
                            <!-- Menu jika belum login -->
                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Register</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

</body>
</html>
