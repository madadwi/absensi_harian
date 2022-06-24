<!DOCTYPE html>
<!doctype html>
<html lang="id">

<head>
    <link type="text/css" href="{{ asset('css/volt.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Absen</title>
</head>

<style>
    .btn-admin, .btn-admin i{
        background-color: grey;
        border-radius: 50%;
        color: white;
    }

    .logo-image {
        width: 200px;
    }
</style>

<body style="background-image: linear-gradient(indigo, purple, black); color:white;">
    <div class="position-relative" id="container">
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container d-flex justify-content-between align-items-center">
                <h4 class="text-white">Selamat Datang di <img class="logo-image" src="{{ asset('img/logo.png') }}"></h4>




            </div>
        </nav>

</html>
<section class="d-flex justify-content-center align-items-center main-section">
    <div class="container">
        <div class="row align-items-center gap-lg-0 gap-3">
            <div class="col-lg-6 order-lg-1 order-2">
                <h1 class="text-white">Absensi Harian</h1>
                <p class="lh-lg">
                    Website ini digunakan untuk absensi harian siswa
                </p>
                <h4 class="text-white">Silahkan Log in dahulu! </h4>
                @if (Route::has('login'))
                <a class="btn btn-danger" href="@auth {{ url('/dashboard') }} @else {{ route('login') }}">Login</a>
                {{-- @if (Route::has('register'))
                <a class="btn btn-primary" href="{{ route('register') }} @endauth">Daftar</a> --}}
                @endif
            </div>
            @endif
            <div class="col-lg-6 order-lg-2 order-1">
                <img class="w-100 rounded-3" src="{{ asset('img/Saly-16.png') }}" alt="Abseen">
            </div>
        </div>
    </div>
</section>
</div>
<!-- <div class="col-lg-6 order-lg-2 order-1">
    <img class="w-100 rounded-3" src="{{ asset('img/vasily-koloda-8CqDvPuo_kI-unsplash.jpg') }}" alt="Abseen">
</div> -->
<script src="{{ asset('vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/volt.js') }}"></script>
</body>

</html>
