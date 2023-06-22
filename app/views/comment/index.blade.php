<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comment lists') }}
        </h2>
    </x-slot>

    <x-card>
            <x-primary-button class="my-4"><a href="{{ route('comment.create') }}"> New Comment</a></x-primary-button>
            <x-table>
                <x-thead>
                    <x-th>{{ __('Name') }}</x-th>
                    <x-th>{{ __('Email') }}</x-th>
                    <x-th>{{ __('Post') }}</x-th>
                    <x-th>{{ __('User') }}</x-th>
                    <x-th>{{ __('Date') }}</x-th>
                    <x-th>{{ __('Edit') }}</x-th>
                </x-thead>

            <x-tbody>
           @foreach ( $comments as $comment )
            <tr>
                <x-td> <a href="{{ route('comment.edit', $comment ) }}">{{ $comment->name }}</a></x-td>
                <x-td> {{ $comment->email }}</x-td>
                <x-td> {{ @$comment->post->title }}</x-td>
                <x-td> {{ @$comment->user->name }}</x-td>
                <x-td> 
                    {{ $comment->created_at }} <br />
                    {{ $comment->updated_at }}
                </x-td>
                <x-td>
                    <a href="{{ route('comment.edit', $comment ) }}"> {{ __('Edit') }}</a> / 
                    <form method="POST" action="{{ route('comment.destroy', $comment ) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('Delete') }}</button></form>
                </x-td>
            </tr>
           @endforeach
            </x-tbody>
            </x-table>
            {{ $comments->onEachSide(5)->links() }}
      
   </x-card>
  
</x-app-layout>
