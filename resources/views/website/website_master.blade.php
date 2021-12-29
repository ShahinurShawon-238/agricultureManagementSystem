<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('frontend/icons/favicon.ico') }}" type="image/x-icon">
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-Frame-Options" content="deny">
    <meta name="description" content="Agriculture Management System">

    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/base.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/skeleton.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/style.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/meganizr.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/demo.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/flaticon/flaticon.css') }}">
    <link type="text/css" rel="stylesheet" media="all" href="{{ asset('frontend/css/template/style.css') }}">

    <script type="text/javascript" src="{{ asset('frontend/js/jquery-1.11.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery-accessibleMegaMenu.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('frontend/css/responsiveslides.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/templates//responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/templates/accessibility.css') }}">

    <script type="text/javascript" src="{{ asset('frontend/js/responsiveslides.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.vticker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/domain_selector.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/utils.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/yoxview/yoxview-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>

</head>
<body>
    <div class="container" style="background: #ffffff;">
        @include('website.banner.index')
        @include('website.menu.index')
        <div id="contents" class="sixteen columns">
            @yield('website')
            @include('website.sidebar.index')
        </div>
    </div>
    @include('website.footer.index')

</body>

</html>