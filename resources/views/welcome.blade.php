@extends('inc.main_auth')
@section('title', 'Welcome')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/fa-brands.css">
@endsection
@section('pages-content')
    @component('inc._auth_header')
        <a href="{{ route('login') }}" class="btn btn-primary text-white ml-auto">
            Login
        </a>
    @endcomponent
    <div class="flex-1"
        style="background: url(/admin/img/svg/pattern-3.svg) no-repeat center bottom fixed; background-size: cover;">
        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
            <div class="row">
                <div class="col col-md-6 col-lg-7">
                    <h2 class="fs-xxl fw-500 mt-4 text-white">
                        WEB INVENTORY PT TRI RESTU BERSAMA
                        <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60">
                            Aplikasi ini dirancang untuk mendukung manajemen inventaris PT TRI RESTU BERSAMA yang bergerak
                            di bidang transportasi karoseri.
                        </small>
                    </h2>
                    <p class="text-white opacity-50">Aplikasi ini menyediakan fitur lengkap untuk mengelola data inventaris,
                        pemantauan stok barang, dan pelacakan aset dalam perusahaan.</p>
                    <div
                        class="d-sm-flex
                            flex-column align-items-center justify-content-center d-md-block">
                        <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">
                            Temukan kami di media sosial
                        </div>
                        <div class="d-flex flex-row opacity-70">
                            <a href="#" class="mr-2 fs-xxl text-white">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a href="#" class="mr-2 fs-xxl text-white">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                            <a href="#" class="mr-2 fs-xxl text-white">
                                <i class="fab fa-google-plus-square"></i>
                            </a>
                            <a href="#" class="mr-2 fs-xxl text-white">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto hidden-sm-down">
                    <div class="py-4">
                        <img src="/admin/img/autoparts1.png" class="display-3 img-responsive" height="400"
                            alt="thumbnail">
                    </div>
                </div>
            </div>
            <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                {{ $profileApp->app_tahun ?? '' }} - @php echo date('Y'); @endphp © {{ $profileApp->app_pengembang ?? '' }}
                &nbsp;
            </div>
        </div>
    </div>
@endsection
