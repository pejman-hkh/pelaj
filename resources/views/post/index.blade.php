<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post lists') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="">
                    <x-table>
                        <x-thead>
                            <x-th>{{ __('Title') }}</x-th>
                            <x-th>{{ __('Text') }}</x-th>
                            <x-th>{{ __('User') }}</x-th>
                            <x-th>{{ __('Date') }}</x-th>
                            <x-th>{{ __('Edit') }}</x-th>
                        </x-thead>

                    <x-tbody>
                   @foreach ( $posts as $post )
                    <tr>
                        <x-td> {{ $post->title }}</x-td>
                        <x-td> {{ $post->note }}</x-td>
                        <x-td> {{ $post->user->name }}</x-td>
                        <x-td> 
                            {{ $post->created_at }} <br />
                            {{ $post->updated_at }}
                        </x-td>
                        <x-td></x-td>
                    </tr>
                   @endforeach
                    </x-tbody>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
