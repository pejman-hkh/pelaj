<x-site-layout title="{{ $post->title }}">

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
            <a href="#" class="pb-6">{!! $post->note !!}</a>
       
        </div>
    </article>

    <div class="w-full sm:max-w mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="">
            @csrf
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="note" :value="__('Comment')" />
                <x-textarea id="note" class="block mt-1 w-full" name="note" :value="old('note')" required autofocus />
                <x-input-error :messages="$errors->get('note')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Send your comment') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-site-layout>
