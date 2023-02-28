@props(['messages'])

@if ($messages)

    <x-slot name="bottomSlot">
        <ul {{ $attributes->merge(['class' => 'text-sm text-danger']) }}>
            @foreach ((array) $messages as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </x-slot>
@endif
