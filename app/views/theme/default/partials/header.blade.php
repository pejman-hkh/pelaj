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


    <nav x-data="{ open: false }" class="bg-blue-800 border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                         <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">

                            @if ( Auth::check() )
                               <li> <a class="px-4" href="{{ route('dashboard') }}"> {{ __('Dashboard') }}</a> </li>
                            @else
                                <li> <a class="px-4" href="{{ route('login') }}"> {{ __('Login') }}</a> </li>
                                <li> <a class="px-4" href="{{ route('register') }}"> {{ __('Register') }}</a> </li>
                            @endif
                            @foreach ( (array)@$menus[1] as $menu )
                                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ $menu->link }}">{{ $menu->title }}</a></li>
                            @endforeach


                        </ul>
                    </div>
                </div>


                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            <div class="pt-4 pb-1 border-t border-gray-200">
                         <ul class="font-bold text-sm text-white uppercase no-underline">

                            @if ( ! Auth::check() )
                                <li class="p-2 px-4"> <a href="{{ route('login') }}"> {{ __('Login') }}</a> </li>
                                <li class="p-2 px-4"> <a href="{{ route('register') }}"> {{ __('Register') }}</a> </li>
                            @endif
                            @foreach ( (array)@$menus[1] as $menu )
                                <li class="p-2 px-4"><a class="hover:text-gray-200 hover:underline" href="{{ $menu->link }}">{{ $menu->title }}</a></li>
                            @endforeach


                        </ul>
            </div>

            @if( Auth::check() )
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link  class="text-white" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-white">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link  class="text-white" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </nav>


    <!-- Text Header -->
    <header class="w-full container mx-auto">
        <div class="flex flex-col items-center py-12">
            <a class="font-bold p-4 text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
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