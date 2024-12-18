@extends('inc.main')
@section('title', 'Throttle')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Core Plugins'])
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-shield-alt'></i> Throttle <sup class='badge badge-danger fw-500'>CORE</sup>
                <small>
                    An intelligent way to increase app performance
                </small>
            </h1>
        </div>
        <div class="alert alert-primary">
            <div class="d-flex flex-start w-100">
                <div class="mr-2 hidden-md-down">
                    <span class="icon-stack icon-stack-lg">
                        <i class="base base-6 icon-stack-3x opacity-100 color-primary-500"></i>
                        <i class="base base-10 icon-stack-2x opacity-100 color-primary-300 fa-flip-vertical"></i>
                        <i class="ni ni-blog-read icon-stack-1x opacity-100 color-white"></i>
                    </span>
                </div>
                <div class="d-flex flex-fill">
                    <div class="flex-fill">
                        <span class="h5">About</span>
                        <p>jQuery throttle / debounce allows you to rate-limit your functions in multiple useful ways.
                            Passing a delay and callback to <code>$.throttle</code> returns a new function that will execute
                            no more than once every delay milliseconds. Passing a delay and callback to
                            <code>$.debounce</code> returns a new function that will execute only once, coalescing multiple
                            sequential calls into a single execution at either the very beginning or end.
                        </p>
                        <p>
                            jQuery isn’t actually required for this plugin, because nothing internal uses any jQuery methods
                            or properties. jQuery is just used as a namespace under which these methods can exist.
                        </p>
                        <p class="m-0">
                            Find in-depth, guidelines, tutorials and more on it's <a
                                href="http://benalman.com/projects/jquery-throttle-debounce-plugin/"
                                target="_blank">Official Documentation</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Sometimes <span class="fw-300"><i>less is more!</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <h5>
                                Throttling
                            </h5>
                            <p>
                                You can pass a delay and function to <code>$.throttle</code> to get a new function, that
                                when called repetitively, executes the original function (in the same context and with all
                                arguments passed through) no more than once every delay milliseconds.
                            </p>
                            <figure class="figure my-4">
                                <img src="/admin/img/demo/throttle.png" class="figure-img img-fluid rounded" alt="throttle">
                                <figcaption class="figure-caption">Throttled with no_trailing specified as false or
                                    unspecified.</figcaption>
                            </figure>
                            <figure class="figure my-4">
                                <img src="/admin/img/demo/throttle-no_trailing.png" class="figure-img img-fluid rounded"
                                    alt="throttle-no_trailing">
                                <figcaption class="figure-caption">Throttled with no_trailing specified as true.
                                </figcaption>
                            </figure>
                            <h5>
                                Debouncing
                            </h5>
                            <p>
                                You can pass a delay and function to <code>$.debounce</code> to get a new function, that
                                when called repetitively, executes the original function just once per “bunch” of calls,
                                effectively coalescing multiple sequential calls into a single execution at either the
                                beginning or end.
                            </p>
                            <figure class="figure my-4">
                                <img src="/admin/img/demo/debounce.png" class="figure-img img-fluid rounded" alt="debounce">
                                <figcaption class="figure-caption">Debounced with at_begin specified as false or unspecified
                                </figcaption>
                            </figure>
                            <figure class="figure my-4">
                                <img src="/admin/img/demo/debounce-at_begin.png" class="figure-img img-fluid rounded"
                                    alt="debounce-no_trailing">
                                <figcaption class="figure-caption">Debounced with at_begin specified as true</figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div id="panel-2" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Usage <span class="fw-300"><i>examples</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip"
                                data-offset="0,10" data-original-title="Fullscreen"></button>
                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10"
                                data-original-title="Close"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <table class="table table-bordered mb-g">
                                <thead>
                                    <tr>
                                        <th style="width: 8rem">
                                            Arguments
                                        </th>
                                        <th>
                                            Description
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <code>delay</code>
                                        </td>
                                        <td class="fs-sm">
                                            (Number) A zero-or-greater delay in milliseconds. For event callbacks, values
                                            around 100 or 250 (or even higher) are most useful.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <code>no_trailing</code>
                                        </td>
                                        <td class="fs-sm">
                                            (Boolean) Optional, defaults to false. If no_trailing is true, callback will
                                            only execute every `delay` milliseconds while the throttled-function is being
                                            called. If no_trailing is false or unspecified, callback will be executed one
                                            final time after the last throttled-function call. (After the throttled-function
                                            has not been called for `delay` milliseconds, the internal counter is reset)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <code>at_begin</code>
                                        </td>
                                        <td class="fs-sm">
                                            (Boolean) Optional, defaults to false. If at_begin is false or unspecified,
                                            callback will only be executed `delay` milliseconds after the last
                                            debounced-function call. If at_begin is true, callback will be executed only at
                                            the first debounced-function call. (After the throttled-function has not been
                                            called for `delay` milliseconds, the internal counter is reset)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <code>callback</code>
                                        </td>
                                        <td class="fs-sm">
                                            (Function) A function to be executed after delay milliseconds. The `this`
                                            context and all arguments are passed through, as-is, to `callback` when the
                                            debounced-function is executed.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h5 class="frame-heading">
                                Script
                            </h5>
                            <div class="frame-wrap">
                                <pre class="prettyprint">
$(window).scroll(
  $.throttle( myapp_config.throttleDelay, function (e) {
	/** -- insert your other scroll codes below this line -- **/
  })
);</pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('pages-script')
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
@endsection
