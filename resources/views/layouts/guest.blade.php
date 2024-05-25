<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>RBAM Importation</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <style>
        *{
            font-weight: bold;
        }
        body{
                background-image: url('{{asset('images/bg3.jpg')}}');
                background-size : 120%;
            }
    </style>
    <body class="font-sans text-gray-900 antialiased">
        <div class="flex flex-col sm:justify-center items-center" style="margin-top: 40px">
            <div class="">
                <a href="https://www.djezzy.dz/" target="_blank">
                <img src="{{asset('images/djezzy.png')}}" alt="img" width="80" height="80"/>                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 dark:bg-green-800 shadow-md overflow-hidden sm:rounded-3xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
