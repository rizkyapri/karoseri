@extends('inc.main')
@section('title', 'Server Error')
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
            <li class="breadcrumb-item">Page Views</li>
            <li class="breadcrumb-item">Error Pages</li>
            <li class="breadcrumb-item active">Server Error</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>
        <div class="subheader"></div>
        <div class="h-alt-hf d-flex flex-column align-items-center justify-content-center text-center">
            <h1 class="page-error color-fusion-500">
                ERROR <span class="text-gradient">404</span>
                <small class="fw-500">
                    Something <u>went</u> wrong!
                </small>
            </h1>
            <h3 class="fw-500 mb-5">
                You have experienced a technical error. We apologize.
            </h3>
            <h4>
                We are working hard to correct this issue. Please wait a few moments and try your search again.
                <br>In the meantime, check out whats new on SmartAdmin WebApp:
            </h4>
        </div>
    </main>
@endsection
