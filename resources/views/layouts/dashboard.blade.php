<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <div id="app">
        @include('partials.header')

        <div class="flex">
            @include('partials.sidebar')

            <main class="flex-1 p-6">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>