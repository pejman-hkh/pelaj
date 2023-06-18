<x-site-layout title="{{ __('Contact') }}">

            <article class="flex flex-col shadow my-4 sm:rounded-lg">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
          
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->title }}</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4"></a>
                    <p href="#" class="text-sm pb-3">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ $post->date }}
                    </p>
                    <a href="#" class="pb-6">{{ $post->note }}</a>
               
                </div>
            </article>

</x-site-layout>
