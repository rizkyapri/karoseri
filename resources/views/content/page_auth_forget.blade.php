@extends('inc.main_auth')
@section('title', 'Login Forget')
@section('pages-content')
    @component('inc._auth_header')
        <span class="text-white opacity-50 ml-auto mr-2 hidden-sm-down">
            Already a member?
        </span>
        <a href="{{ route('auth_login') }}" class="btn-link text-white ml-auto ml-sm-0">
            Secure Login
        </a>
    @endcomponent
    <div class="flex-1"
        style="background: url(/admin/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
        <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
            <div class="row">
                <div class="col-xl-12">
                    <h2 class="fs-xxl fw-500 mt-4 text-white text-center">
                        "My dog ate my password"
                        <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                            Not a problem, happens to the best of us. Just use the form below to reset it!
                        </small>
                    </h2>
                </div>
                <div class="col-xl-6 ml-auto mr-auto">
                    <div class="card p-4 rounded-plus bg-faded">
                        <form id="js-login" novalidate="" action="/">
                            <div class="form-group">
                                <label class="form-label" for="lostaccount">Your username or email</label>
                                <input type="email" id="lostaccount" class="form-control" placeholder="Recovery email"
                                    required>
                                <div class="invalid-feedback">No, you missed this one.</div>
                                <div class="help-block">We will email you the instructions</div>
                            </div>
                            <div class="row no-gutters">
                                <div class="col-md-4 ml-auto text-right">
                                    <button id="js-login-btn" type="submit" class="btn btn-danger">Recover</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-block text-center text-white">
            {{ $profileApp->app_tahun ?? '' }} © {{ $profileApp->app_pengembang ?? '' }} by&nbsp;<a
                href="https://laravel.com/docs/10.x" title='laravel.com' class="btn-link font-weight-bold"
                target="_blank">Laravel
                v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</a>
        </div>
    </div>
@endsection
@section('pages-script')
    <script>
        $("#js-login-btn").click(function(event) {

            // Fetch form to apply custom Bootstrap validation
            var form = $("#js-login")

            if (form[0].checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.addClass('was-validated');
            // Perform ajax submit here...
        });
    </script>
@endsection
