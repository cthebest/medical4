<div>
    <x-adminlte-input name="element" label="Seleccione una categoría" wire:model="query"
                      placeholder="Busque y seleccione una categoría">

        <x-slot name="appendSlot">
            <button type="button" class="btn btn-secondary">
                <i class="fas fa-search"></i>

            </button>
        </x-slot>

        <x-slot name="bottomSlot">
            @if ($title)
                <span class="badge badge-primary">{{ $title }}</span>
            @endif
            <div class="list-group mt-1">
                @if ($categories && $categories->count() > 0)
                    @foreach ($categories as $category)
                        <button type="button" class="list-group-item list-group-item-action"
                                wire:click="addCategory({{ $category }})">{{ $category->name }}</button>
                    @endforeach
                @endif
            </div>

            @if($errors->has('resource_id'))
                <span class="invalid-feedback d-block" role="alert"><strong>{{ $errors->first('resource_id') }}</strong></span>
            @endif
        </x-slot>
    </x-adminlte-input>


    <input type="text" name="resource_id" value="{{ $resource_id }}" hidden>
</div>
