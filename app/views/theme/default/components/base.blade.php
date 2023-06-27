@props(['title' => ''])

    @include('Site::partials.header')

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

    @include('Site::partials.footer')