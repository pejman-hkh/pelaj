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
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <div class="container mx-auto flex flex-wrap py-6">
                
                <!-- Page Content -->
                <main class="w-full md:w-5/6 px-3">
                    {{ $slot }}
                </main>

                <aside class="w-full md:w-1/6 items-center px-3">
                   <x-card>
                    <ul>
                        <li><a href="{{ route('post.index') }}">Posts</a></li>
                        <li class="mt-4"><a href="{{ route('menu.index') }}">Menus</a></li>
                        <li class="mt-4"><a href="{{ route('config.index') }}">Configs</a></li>
                    </ul>
                   </x-card>             
                </aside>
            </div>

        </div>
    </body>
</html>
