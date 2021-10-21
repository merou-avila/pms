<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    @include('layouts.fragments.head')
    @yield('head-addon')

</head>
<body>

    <div class="col-12 d-flex align-items-center justify-content-center">

        @yield('content')

    </div>

@include('layouts.fragments.scripts')
@yield('footer-addon')

</body>
</html>
