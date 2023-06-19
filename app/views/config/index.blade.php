<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Config lists') }}
        </h2>
    </x-slot>

    <x-card>
            <x-primary-button class="my-4"><a href="{{ route('config.create') }}"> New Config</a></x-primary-button>
            <x-table>
                <x-thead>
                    <x-th>{{ __('Key') }}</x-th>
                    <x-th>{{ __('Val') }}</x-th>
                    <x-th>{{ __('User') }}</x-th>
                    <x-th>{{ __('Date') }}</x-th>
                    <x-th>{{ __('Edit') }}</x-th>
                </x-thead>

            <x-tbody>
           @foreach ( $configs as $config )
            <tr>
                <x-td> <a href="{{ route('config.edit', $config ) }}">{{ $config->key }}</a></x-td>
                <x-td> {{ $config->val }}</x-td>

                <x-td> {{ $config->user?->name }}</x-td>
                <x-td> 
                    {{ $config->created_at }} <br />
                    {{ $config->updated_at }}
                </x-td>
                <x-td>
                    <a href="{{ route('config.edit', $config ) }}"> {{ __('Edit') }}</a> / 
                    <form method="POST" action="{{ route('config.destroy', $config ) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">{{ __('Delete') }}</button></form>
                </x-td>
            </tr>
           @endforeach
            </x-tbody>
            </x-table>
            {{ $configs->onEachSide(5)->links() }}
      
   </x-card>
  
</x-app-layout>
