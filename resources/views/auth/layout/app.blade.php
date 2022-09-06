<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title') | {{ env('APP_DESC') }}</title>
    <meta name="description" content="{{ env('APP_DESC') }}">
    <meta name="author" content="Asan Webs Development">
    <link href="{{ asset('assets/css/vendor.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jvectormap-next/jquery-jvectormap.css') }}" rel="stylesheet" />
    @yield('head')
</head>

<body class='pace-top'>
    <div id="app" class="app app-full-height app-without-header">
        <div class="login">
            <div class="login-content">
                @yield('form')
            </div>
        </div>
        <a href="#" data-toggle="scroll-to-top" class="btn-scroll-top fade"><i class="fa fa-arrow-up"></i></a>
        <div class="app-theme-panel">
            <div class="app-theme-panel-container">
                <a href="javascript:;" data-toggle="theme-panel-expand" class="app-theme-toggle-btn"><i
                        class="bi bi-sliders"></i></a>
                <div class="app-theme-panel-content">
                    <div class="small fw-bold text-white mb-1">Theme Color</div>
                    <div class="card mb-3">
                        <div class="card-body p-2">
                            <div class="app-theme-list">
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-pink" data-theme-class="theme-pink"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-red" data-theme-class="theme-red"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-warning" data-theme-class="theme-warning"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-yellow" data-theme-class="theme-yellow"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-lime" data-theme-class="theme-lime"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-green" data-theme-class="theme-green"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
                                <div class="app-theme-list-item active"><a href="javascript:;"
                                        class="app-theme-list-link bg-teal" data-theme-class=""
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-info" data-theme-class="theme-info"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-primary" data-theme-class="theme-primary"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-purple" data-theme-class="theme-purple"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-indigo" data-theme-class="theme-indigo"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
                                <div class="app-theme-list-item"><a href="javascript:;"
                                        class="app-theme-list-link bg-gray-100" data-theme-class="theme-gray-200"
                                        data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-title="Gray">&nbsp;</a></div>
                            </div>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </div>
                    <div class="small fw-bold text-white mb-1">Theme Cover</div>
                    <div class="card">
                        <div class="card-body p-2">
                            <div class="app-theme-cover">
                                <div class="app-theme-cover-item active">
                                    <a href="javascript:;" class="app-theme-cover-link"
                                        style="background-image: url(assets/img/cover/cover-thumb-1.jpg);"
                                        data-theme-cover-class="" data-toggle="theme-cover-selector"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                        data-bs-title="Default">&nbsp;</a>
                                </div>
                                <div class="app-theme-cover-item">
                                    <a href="javascript:;" class="app-theme-cover-link"
                                        style="background-image: url(assets/img/cover/cover-thumb-2.jpg);"
                                        data-theme-cover-class="bg-cover-2" data-toggle="theme-cover-selector"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                        data-bs-title="Cover 2">&nbsp;</a>
                                </div>
                                <div class="app-theme-cover-item">
                                    <a href="javascript:;" class="app-theme-cover-link"
                                        style="background-image: url(assets/img/cover/cover-thumb-3.jpg);"
                                        data-theme-cover-class="bg-cover-3" data-toggle="theme-cover-selector"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                        data-bs-title="Cover 3">&nbsp;</a>
                                </div>
                                <div class="app-theme-cover-item">
                                    <a href="javascript:;" class="app-theme-cover-link"
                                        style="background-image: url(assets/img/cover/cover-thumb-4.jpg);"
                                        data-theme-cover-class="bg-cover-4" data-toggle="theme-cover-selector"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                        data-bs-title="Cover 4">&nbsp;</a>
                                </div>
                                <div class="app-theme-cover-item">
                                    <a href="javascript:;" class="app-theme-cover-link"
                                        style="background-image: url(assets/img/cover/cover-thumb-5.jpg);"
                                        data-theme-cover-class="bg-cover-5" data-toggle="theme-cover-selector"
                                        data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body"
                                        data-bs-title="Cover 5">&nbsp;</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <x-alert />
    @yield('footer')
</body>

</html>
