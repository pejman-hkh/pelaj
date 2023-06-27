@props(['title' => ''])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ @$configs->mainTitle }}</title>
    <!-- Fonts -->

    <meta name="description" content="{{ @$configs->description }}">
    <meta name="keywords" content="{{ @$configs->keywords }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <nav class="w-full py-4 bg-blue-800 shadow">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

            <nav>
                <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">

                    @if ( \Illuminate\Support\Facades\Auth::check() )
                       <li> <a class="px-4" href="{{ route('dashboard') }}"> {{ __('Dashboard') }}</a> </li>
                    @else
                        <li> <a class="px-4" href="{{ route('login') }}"> {{ __('Login') }}</a> </li>
                        <li> <a class="px-4" href="{{ route('register') }}"> {{ __('Register') }}</a> </li>
                    @endif
                    @foreach ( (array)@$menus[1] as $menu )
                        <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ $menu->link }}">{{ $menu->title }}</a></li>
                    @endforeach


                </ul>
            </nav>

            <div class="flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="#">
                    <i class="fab fa-facebook"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="pl-6" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>

    </nav>

    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
                {{ @$configs->mainTitle }}
            </a>
            <p class="text-lg text-gray-600">
                {{ $title }}
            </p>
        </div>
    </header>

    <!-- Topic Nav -->
    <nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
        <div class="block sm:hidden">
            <a
                href="#"
                class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
                @click="open = !open"
            >
                Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
            </a>
        </div>
        <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
            <div class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-center text-sm font-bold uppercase mt-0 px-6 py-2">
                @foreach ( (array)@$menus[2] as $menu )
                <a href="{{$menu->link}}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{$menu->title}}</a>
                @endforeach
                @foreach ( @$cats as $cat )
                <a href="{{$cat->link}}" class="hover:bg-gray-400 rounded py-2 px-4 mx-2">{{$cat->title}}</a>
                @endforeach
            </div>
        </div>
    </nav>


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col px-3">
          {{ $slot }}
        </section>

        <!-- Sidebar Section -->
        <aside class="w-full md:w-1/3 flex flex-col items-center px-3">

            <div class="w-full bg-white shadow sm:rounded-lg flex flex-col my-4 p-6">
                <p class="text-xl font-semibold pb-5">{{ __('About Us') }}</p>
                <p class="pb-2">{{ @$configs->about }}</p>
                <a href="{{ @$configs->aboutUrl }}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
                    {{ __('Get to know us') }}
                </a>
            </div>

        </aside>

    </div>

    <footer class="w-full border-t bg-white pb-12">
        <div
            class="relative w-full flex items-center invisible md:visible md:pb-12"
            x-data="getCarouselData()"
        >
            <button
                class="absolute bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 ml-12"
                x-on:click="decrement()">
                &#8592;
            </button>
            <template x-for="image in images.slice(currentIndex, currentIndex + 6)" :key="images.indexOf(image)">
                <img class="w-1/6 hover:opacity-75" :src="image">
            </template>
            <button
                class="absolute right-0 bg-blue-800 hover:bg-blue-700 text-white text-2xl font-bold hover:shadow rounded-full w-16 h-16 mr-12"
                x-on:click="increment()">
                &#8594;
            </button>
        </div>
        <div class="w-full container mx-auto flex flex-col items-center">
            <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
                @foreach ( (array)@$menus[6] as $menu )
                <a href="{{ $menu->link }}" class="uppercase px-3">{{ $menu->title }}</a>
                @endforeach
     
            </div>
            <div class="uppercase pb-6">&copy; {{ @$configs->siteUrl }}</div>
        </div>
    </footer>
</body>

</html>
