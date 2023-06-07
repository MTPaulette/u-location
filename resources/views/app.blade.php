<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark"> -->
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>agrimax</title>
        @routes
        @vite(['resources/css/app.css','resources/js/app.js'])
        <!-- @vite('resources/js/app.js') -->
        @inertiaHead
    </head>
    <!-- <body class="bg-white dark:bg-gray-900"> -->
    <body class="bg-white dark:bg-gray-800">
        @inertia
    </body>
</html>
