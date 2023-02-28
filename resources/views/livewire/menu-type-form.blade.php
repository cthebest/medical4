<div>

    @include('menu_items.partials.components_modal')

    <x-adminlte-input name="element" label="Tipo de elemento" wire:model="title" readonly>
        <x-slot name="appendSlot">
            <x-adminlte-button theme="outline-primary" label="{{ __('adminlte::adminlte.select') }}" type='button'
                wire:click="openComponent" />
        </x-slot>
    </x-adminlte-input>
    @if ($field)
        @livewire($field, ['resource_id' => $resource_id])
    @endif

    <input type="text" name="component_id" value="{{ $component_id }}" hidden readonly>
    <input type="text" name="component_option_id" value="{{ $component_option_id }}" hidden readonly>

</div>


<script>
    window.addEventListener('openComponent', event => {
        $("#openComponent").modal('show');
    })
    window.addEventListener('closeComponent', event => {
        $("#openComponent").modal('hide');
    })
</script>
