<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post lists') }}
        </h2>
    </x-slot>


    <x-card>
            <x-primary-button class="my-4"><a href="{{ route('post.create') }}"> New post</a></x-primary-button>
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
                <x-td>
                    <a href="{{ route('post.edit', $post ) }}"> {{ __('Edit') }}</a> / 
                    <a href="{{ route('post.edit', $post ) }}"> {{ __('Delete') }}</a>
                </x-td>
            </tr>
           @endforeach
            </x-tbody>
            </x-table>
            {{ $posts->onEachSide(5)->links() }}
      
   </x-card>
  
</x-app-layout>
