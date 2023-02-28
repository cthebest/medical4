<div>
    <x-adminlte-input name="element" label="Seleccione un artículo" wire:model="query"
        placeholder="Busque y seleccione un artículo">

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
                @if ($articles && $articles->count() > 0)
                    @foreach ($articles as $article)
                        <button type="button" class="list-group-item list-group-item-action"
                            wire:click="addArticle({{ $article }})">{{ $article->title }}</button>
                    @endforeach
                @endif
            </div>
        </x-slot>
    </x-adminlte-input>

    <input type="text" name="resource_id" value="{{ $resource_id }}" hidden>

</div>
