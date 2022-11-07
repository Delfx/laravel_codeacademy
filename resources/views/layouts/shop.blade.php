<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])

    @stack('styles')

    <title>{{ config('app.name') }} - @yield('title')</title>
</head>

<body>
    <div class="container py-3">
        @include('partials.header')
        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
</body>

@stack('scripts')

</html>
