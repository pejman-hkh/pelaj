<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

   
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

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

                    @if( auth()->user()->isadmin )
                    <ul>
                        @foreach ($modelsMenu as $title => $model)
                        @if( is_array( $model ) )
                        <details class=" rounded-lg">
                            <summary class="cursor-pointer"> {{$title}} </summary>
                            <div class="py-2">
                                <ul class="ml-3 mt-2">        
                                    @foreach( $model as $sub )
                                    <li class="mb-4"><a href="{{ url('/').'/manager/index/'.$sub }}">{{ __($sub) }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </details>
                        @else
                        <li class="mb-4"><a href="{{ url('/').'/manager/index/'.$model }}">{{ __($model) }}</a></li>
                        @endif

                        @endforeach
                    </ul>
                    @endif

                   </x-card>             
                </aside>
            </div>

        </div>

        <x-mmodal></x-mmodal>

    </body>
</html>