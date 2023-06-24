@props(['title' => '', 'bodyClass' => '' ])


<div {{ $attributes->merge(['class' => 'w-full mx-auto space-y-6 mb-4']) }}>
    <div class="bg-white shadow sm:rounded-lg">
        @if( $title )
        <h1 class="p-3 sm:p-3 border-solid border-0 border-b border-slate-300">{{ $title }}</h1>
        @endif
        <div class="p-4 sm:p-8 {{ $bodyClass }}">
        {{ $slot }}
        </div>
    </div>
</div>