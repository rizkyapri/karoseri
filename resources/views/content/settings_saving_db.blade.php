@extends('inc.main')
@section('title', 'Saving to Database')
@section('pages-css')
    <link rel="stylesheet" media="screen, print" href="/admin/css/theme-demo.css">
@endsection
@section('pages-content')
    <main id="js-page-content" role="main" class="page-content">
        @include('inc._page_breadcrumb', ['category_1' => 'Theme Settings'])
        <div class="subheader">
            @component('inc._page_heading', [
                'heading1' => 'Theme Settings:',
                'heading2' => 'Saving to Database',
                'pagedescription' => 'How to save and load settings from database',
            ])
            @endcomponent
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Test <span class="fw-300"><i>it out!</i></span>
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
                            <div class="panel-tag">
                                All changes are stored to localStorage by default. <strong>pushSettings()</strong> inherits
                                this trait. Set <code>"storeLocally"</code> to <strong>false</strong> via
                                <strong>app.config.js</strong> to disable this action.
                            </div>
                            <div class="row">
                                <div class="col-xl-6 order-2 order-xl-1">
                                    <div class="form-group">
                                        <label for="pushSettings_input">
                                            <strong>Push Settings</strong>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" id="pushSettings_input" list="css_list"
                                                name="pushSettings_input" class="form-control"
                                                placeholder="e.g. header-function-fixed nav-function-fixed">
                                            <datalist id="css_list">
                                                <option value="header-function-fixed">
                                                <option value="nav-function-fixed">
                                                <option value="nav-function-minify">
                                                <option value="nav-function-hidden">
                                                <option value="nav-function-top">
                                                <option value="mod-main-boxed">
                                                <option value="nav-mobile-push">
                                                <option value="nav-mobile-no-overlay">
                                                <option value="nav-mobile-slide-out">
                                                <option value="mod-bigger-font">
                                            </datalist>
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary btn-w-m" type="button"
                                                    id="pushSettings_btn">push()</button>
                                            </div>
                                        </div>
                                        <div class="help-block">
                                            $.ajax({ .. success: function (data) { var DataBase_str = data[i].appSettings }
                                            .. }); initApp.pushSettings( DataBase_str );
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="getSettings_input">
                                            <strong>Get Settings</strong>
                                        </label>
                                        <div class="input-group">
                                            <input type="text" id="getSettings_input" name="getSettings_input"
                                                readonly="readonly" class="form-control"
                                                placeholder="filters and returns nav-*, header-*, mod-*, & display-*">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary btn-w-m" type="button"
                                                    id="getSettings_btn">get()</button>
                                            </div>
                                        </div>
                                        <div class="help-block">
                                            var DataBase_str = initApp.getSettings(); $.ajax({ data: {DataBase_str},
                                            dataType: "json" ... })
                                        </div>
                                    </div>
                                    <hr class="my-5">
                                    <button class="btn btn-outline-danger mr-1" type="button"
                                        data-action="app-reset"><u>R</u>eset Settings</button>
                                    <button class="btn btn-outline-success" type="button"
                                        id="ng_eventlog_clear"><u>C</u>lear Events</button>
                                </div>
                                <div class="col-xl-6 order-1 order-xl-1">
                                    <div id="app-eventlog" class="alert alert-primary p-1 h-auto mb-4 mb-xl-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('pages-script')
    <script type="text/javascript">
        var ng_eventlog = function() {

            if ($('#app-eventlog').length) {

                var dt = new Date(),
                    time = "<div class='p-1'><span class='badge badge-primary fw-500 rounded-0'>" + dt.getHours() +
                    ":" + dt.getMinutes() + ":" + dt.getSeconds() + " </span> <i>body class changed to: </i>";
                $('#app-eventlog').prepend(time + "<strong> [ " + initApp.getSettings().split(' ') + " ] </strong>" +
                    "</div/>");

            }

        };

        var ng_eventlog_clear = function() {
            $('#app-eventlog').empty();
        }

        var ng_pushSettings = function() {
            if ($('#pushSettings_input').val()) {
                initApp.pushSettings($('#pushSettings_input').val());
                $('#pushSettings_input').val('');
                ng_eventlog();
            }
        }

        var ng_getSettings = function() {
            var getSettings_array = initApp.getSettings();
            if (getSettings_array) {
                $('#getSettings_input').val(getSettings_array)
            } else {
                $('#getSettings_input').val('<body> class is empty or nothing to return')
            }
        }

        $('[data-action="toggle"]').on('click', function() {
            ng_eventlog();
        });

        $('#pushSettings_btn').on('click', function() {
            ng_pushSettings();
        });

        $('#getSettings_btn').on('click', function() {
            ng_getSettings();
        });

        $('#ng_eventlog_clear').on('click', function() {
            ng_eventlog_clear();
        });
    </script>
@endsection
