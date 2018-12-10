<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="{{str_slug($__env->yieldContent('page-title'), '-')}}">
    <div id="app" class="page">
        <navigation>
            <template slot="left">
                <b-navbar-brand href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</b-navbar-brand>
            </template>
            <template slot="center">

            </template>
            <template slot="right">
                @include('layouts.menus')
                <!-- <b-nav-item href="{{ route('voyager.login') }}">{{ __('Login') }}</b-nav-item> -->
            </template>
        </navigation>
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>