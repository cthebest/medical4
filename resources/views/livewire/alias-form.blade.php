<div>
    <x-adminlte-input :name="$name_property" label="{{ trans('adminlte::adminlte.name') }}" wire:model="name">
    </x-adminlte-input>
    <x-adminlte-input name="alias" label="Alias" :value="$alias" placeholder="Este campo se llenará automáticamente">
    </x-adminlte-input>
</div>
