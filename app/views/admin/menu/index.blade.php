<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Menu lists') }}
        </h2>
    </x-slot>

    <x-card>
            <x-primary-button class="my-4"><a href="{{ route('menu.create') }}"> New Menu</a></x-primary-button>
            <x-table>
                <x-thead>
                    <x-th>{{ __('Title') }}</x-th>
                    <x-th>{{ __('Position') }}</x-th>
                    <x-th>{{ __('Url') }}</x-th>
                    <x-th>{{ __('User') }}</x-th>
                    <x-th>{{ __('Date') }}</x-th>
                    <x-th>{{ __('Edit') }}</x-th>
                </x-thead>

            <x-tbody>
           @foreach ( $menus as $menu )
            <tr>
                <x-td> <a href="{{ route('menu.edit', $menu ) }}">{{ $menu->title }}</a></x-td>
                <x-td> {{ $menu->positionTitle }}</x-td>
                <x-td> <a href="{{ $menu->link }}" target="_blank">{{ $menu->url }}</a></x-td>
                <x-td> {{ $menu->user->name }}</x-td>
                <x-td> 
                    {{ $menu->created_at }} <br />
                    {{ $menu->updated_at }}
                </x-td>
                <x-td>
                    <a href="{{ route('menu.edit', $menu ) }}"> {{ __('Edit') }}</a> / 
                    <form method="POST" action="{{ route('menu.destroy', $menu ) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('Delete') }}</button></form>
                </x-td>
            </tr>
           @endforeach
            </x-tbody>
            </x-table>
            {{ $menus->onEachSide(5)->links() }}
      
   </x-card>
  
</x-app-layout>
