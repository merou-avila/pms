<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.fragments.head')
    @yield('head-addon')
</head>
<body class="@yield('body-class'){{ auth()->check() ? 'logged-in' : '' }}">

    @include('layouts.fragments.nav')
    @include('layouts.navs.aside')

    <main class="py-4 px-lg-2 mx-1">
        @yield('content')
    </main>

    @include('layouts.fragments.scripts')
    @yield('footer-addon')
</body>
</html>
