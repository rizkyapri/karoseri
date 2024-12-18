@extends('inc.main')
@section('title', 'How it works')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Theme Settings'])
        <div class="subheader">
            @component('inc._page_heading', [
                'heading1' => 'Theme Settings:',
                'heading2' => 'How it works',
            ])
                @slot('pagedescription')
                    <span class='fw-500 color-info-700'>Mix and match</span> layout options to create over
                    <span class='fw-500 color-info-700'>36 layout possibilities</span>. Get the perfect
                    layout to suite your business needs
                @endslot
            @endcomponent
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-xl-6">
                <div class="card mb-g">
                    <div class="card-body">
                        <h4 class="mb-g mt-2 text-center">
                            Layout type <strong>"Fixed Header"</strong> <br>
                            <small>
                                Header is in a fixed position at all times
                                <code>.header-function-fixed</code>
                            </small>
                        </h4>
                        <div class="demo-window rounded mb-g shadow-1 m-auto" style="max-width:550px">
                            <div class="demo-window-content">
                                <div class="d-flex app-body-demo">
                                    <div class="app-nav-demo bg-fusion-200">
                                        <div class="p-1 pt-0 bg-primary-300 pattern-0 app-header-demo">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column flex-1">
                                        <div class="app-header-demo bg-primary-300 pattern-0">
                                            &nbsp;
                                        </div>
                                        <div class="app-container-demo flex-1 p-3">
                                            <img src="/admin/img/demo/s-1.png" class="w-100" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6">
                <div class="card mb-g">
                    <div class="card-body">
                        <h4 class="mb-g mt-2 text-center">
                            Layout type <strong>"Fixed Navigation"</strong> <br>
                            <small>
                                Increase accessibility by locking navigation
                                <code>.nav-function-fixed</code>
                            </small>
                        </h4>
                        <div class="demo-window rounded mb-g shadow-1 m-auto" style="max-width:550px">
                            <div class="demo-window-content">
                                <div class="d-flex app-body-demo">
                                    <div class="app-nav-demo bg-primary-300 pattern-0 p-1 pt-0"></div>
                                    <div class="d-flex flex-column flex-1">
                                        <div class="app-header-demo bg-fusion-200"></div>
                                        <div class="app-container-demo flex-1 p-3">
                                            <img src="/admin/img/demo/s-1.png" class="w-100" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6">
                <div class="card mb-g">
                    <div class="card-body">
                        <h4 class="mb-g mt-2 text-center">
                            Layout type <strong>"Minify Navigation"</strong> <br>
                            <small>
                                Minify navigation space to only icons
                                <code>.nav-function-minified</code>
                            </small>
                        </h4>
                        <div class="demo-window rounded mb-g shadow-1 m-auto" style="max-width:550px">
                            <div class="demo-window-content">
                                <div class="d-flex app-body-demo">
                                    <div class="app-nav-demo-minify bg-primary-300 pattern-0"></div>
                                    <div class="d-flex flex-column flex-1">
                                        <div class="app-header-demo bg-fusion-200"></div>
                                        <div class="app-container-demo flex-1 p-3">
                                            <img src="/admin/img/demo/s-1.png" class="w-100" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6">
                <div class="card mb-g">
                    <div class="card-body">
                        <h4 class="mb-g mt-2 text-center">
                            Layout type <strong>"Hide Navigation"</strong> <br>
                            <small>
                                Maximize workspace by hiding navigation
                                <code>.nav-function-hidden</code>
                            </small>
                        </h4>
                        <div class="demo-window rounded mb-g shadow-1 m-auto" style="max-width:550px">
                            <div class="demo-window-content">
                                <div class="d-flex app-body-demo">
                                    <div class="app-nav-demo-hidden bg-primary-300 pattern-0">&nbsp;</div>
                                    <div class="d-flex flex-column flex-1">
                                        <div class="app-header-demo bg-fusion-200"></div>
                                        <div class="app-container-demo flex-1 p-3">
                                            <img src="/admin/img/demo/s-1.png" class="w-100" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6">
                <div class="card mb-g">
                    <div class="card-body">
                        <h4 class="mb-g mt-2 text-center">
                            Layout type <strong>"Top Navigation"</strong> <br>
                            <small>
                                Add the following class(s) to body tag
                                <code>.nav-function-top</code>
                            </small>
                        </h4>
                        <div class="demo-window rounded mb-g shadow-1 m-auto" style="max-width:550px">
                            <div class="demo-window-content">
                                <div class="d-flex flex-column app-body-demo">
                                    <div class="app-header-demo bg-fusion-200"></div>
                                    <div class="app-nav-demo-top bg-primary-300 pattern-0 p-1"></div>
                                    <div class="app-container-demo flex-1 p-3" style="overflow:hidden;">
                                        <img src="/admin/img/demo/s-1.png" class="w-100" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-6">
                <div class="card mb-g">
                    <div class="card-body">
                        <h4 class="mb-g mt-2 text-center">
                            Layout type <strong>"Boxed Layout"</strong> <br>
                            <small>
                                Add the following class(s) to body tag
                                <code>.mod-main-boxed</code>
                            </small>
                        </h4>
                        <div class="demo-window rounded mb-g shadow-1 m-auto" style="max-width:550px">
                            <div class="demo-window-content">
                                <div class="app-body-demo d-flex pl-5 pr-5 bg-primary-100 mod-main-boxed mod-bg-3">
                                    <div class="app-nav-demo bg-fusion-300 p-1 pt-0"></div>
                                    <div class="d-flex flex-column flex-1">
                                        <div class="app-header-demo bg-fusion-200"></div>
                                        <div class="app-container-demo bg-white flex-1 p-3">
                                            <img src="/admin/img/demo/s-1.png" class="w-100" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
