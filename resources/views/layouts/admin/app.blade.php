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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="skin-blue">
        <header class="w-100 d-flex justify-content-between align-items-center bg-light px-3">
            @include('layouts.admin.navigation')
        </header>            
        <div class="flex flex-wrap">
            @include('layouts.admin.side')
            <!-- コンテンツヘッダ -->
            @yield('content')
        </div>
    </body>
</html>
