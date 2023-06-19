@props(['disabled' => false])

<select x-init="$el.value=$el.getAttribute('value')" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
{{ $slot }}
</select>