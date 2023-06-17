<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post ') }} {{ $post?__('Edit'):__('New')}}
        </h2>
    </x-slot>


    <x-card>
        
        <x-primary-button class="my-4"><a href="{{ route('post.index') }}"> Post list </a></x-primary-button>

        <form method="POST" action="{{ route('post.store') }}">
            @csrf
 
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ @$post->title }}" required autofocus autocomplete="" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

      
    
            <div class="mt-4">
                <x-input-label for="note" :value="__('Text')" />
                <x-textarea id="note" class="block mt-1 w-full" name="note" value="{{ @$post->note }}" required autofocus />
                <x-input-error :messages="$errors->get('note')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ $post?__('Edit'):__('Send') }}
                </x-primary-button>
            </div>
        </form>                
    </x-card>

 
</x-app-layout>
