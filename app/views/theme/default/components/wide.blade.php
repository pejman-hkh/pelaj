@props(['title' => ''])
@include('Site::partials.header')

    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-3/3 flex flex-col px-3">
          {{ $slot }}
        </section>

    </div>

@include('Site::partials.footer')