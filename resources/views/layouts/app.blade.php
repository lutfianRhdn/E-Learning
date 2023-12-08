<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://kit.fontawesome.com/c79e6e3413.js" crossorigin="anonymous"></script>
    </head>
    <body class="font-sans antialiased  w-screen">
        <div class="flex  ">

                
                @include('layouts.sidebar')
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex-auto">
            @include('layouts.navigation')
            <main>
                {{ $slot }}
            </main>
        </div>
        </div>
        {{$scripts ??''}}
        <script>
            $(document).ready(function() {
    $('.select2').select2();
});
        </script>
    </body>

</html>
