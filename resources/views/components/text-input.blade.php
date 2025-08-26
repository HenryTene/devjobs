{{-- @props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) !!}> --}}
@props(['disabled' => false])

<input
    {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->merge([
        'class' => '
            w-full
            px-4 py-2
            border border-gray-300
            rounded-md
            shadow-sm
            text-sm
            text-gray-700
            focus:border-indigo-500
            focus:ring-indigo-500
            focus:ring-2
            focus:ring-offset-2
            transition
            ease-in-out
            duration-150
            disabled:bg-gray-100
            disabled:text-gray-500
            disabled:cursor-not-allowed
        '
    ]) !!}
/>
