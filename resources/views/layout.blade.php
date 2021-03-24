<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="{{ mix('js/app.js') }}" defer></script>

    <style>
        .h-screen{

        height: 100vh;
        }
    </style>
</head>
<body>
    <div id="app" class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials.nav')

            @include('partials.session-status')
        </header>
        <main clasS="py-3">
            @yield('content')
        </main>
        <footer class="bg-white text-center text-black-50 py-3 shadow">
            {{ config('app.name') }} | Copyright @ {{ date('Y')}}
        </footer>
    </div>
</body>
</html>