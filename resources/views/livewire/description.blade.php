<div>
    <x-adminlte-input name="description" label="{{ trans('adminlte::adminlte.description') }}" placeholder="descripción"
        wire:model="description">
        <x-slot name="bottomSlot">
            <span class="text-sm text-gray">
                Caracteres restantes: {{ $chars_left }}
            </span>
        </x-slot>
    </x-adminlte-input>
</div>
