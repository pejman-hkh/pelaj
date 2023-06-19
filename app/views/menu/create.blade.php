<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu ') }} {{ @$menu->id?__('Edit ').$menu->title:__('New')}}
        </h2>
    </x-slot>


    <x-card>
        
        <x-primary-button class="my-4"><a href="{{ route('menu.index') }}"> Menu list </a></x-primary-button>

        <form method="POST" action="{{ @$menu->id?route('menu.update', $menu->id ):route('menu.store') }}">
            @csrf
            @if( @$menu->id )
             @method('PUT')
            @endif
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ @$menu->title }}" required autofocus autocomplete="" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="url" :value="__('Url')" />
                <x-text-input id="url" class="block mt-1 w-full" type="text" name="url" value="{{ @$menu->url }}" autofocus autocomplete="" />
                <x-input-error :messages="$errors->get('url')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="position" :value="__('Position')" />
                <x-select id="position" class="block mt-1 w-full" type="text" name="position" value="{{ @$menu->position }}">
                    <option value="">Select</option>
                    @foreach( $menu->positions as $pos )
                    <option value="{{ $pos->val }}">{{ $pos->val }} - {{ $pos->title }}</option>
                    @endforeach
                </x-select>

                <x-input-error :messages="$errors->get('position')" class="mt-2" />
            </div>

 
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ @$menu->id?__('Edit'):__('Send') }}
                </x-primary-button>
            </div>
        </form>                
    </x-card>

 
</x-app-layout>
