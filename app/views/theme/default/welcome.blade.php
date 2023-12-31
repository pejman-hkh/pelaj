<x-Site::base title="{{ __('Home') }}">
    @foreach ( $posts as $post )
            <article class="flex flex-col shadow my-4 sm:rounded-lg">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
          
                </a>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="{{ $post->link }}" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->title }}</a>

                    <p href="#" class="text-sm pb-3">
                        {{ __('By') }} <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, {{ __('Published on') }} {{ $post->date }}
                    </p>
                    <a href="#" class="pb-6">{!! $post->shortnote !!}</a>
                    <a href="{{ $post->link }}" class="uppercase text-gray-800 hover:text-black">{{ __('Continue Reading') }} <i class="fas fa-arrow-right"></i></a>
                </div>
            </article>
   
    @endforeach

</x-Site::base>
