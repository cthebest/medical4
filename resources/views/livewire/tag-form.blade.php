<div>
    <x-adminlte-input name="query" label="{{trans('adminlte::adminlte.tag') }}"
                      placeholder="Busque o cree una nueva etiqueta para este recurso" wire:model="query">
        <x-slot name="prependSlot">
            <div class="input-group-text text-olive">
                <i class="fas fa-tag"></i>
            </div>
        </x-slot>
        <x-slot name="bottomSlot">
            <div class="list-group mt-1">
                @if($tags->count()>0)
                    @foreach($tags as $tag)
                        @if(!array_key_exists($tag->alias, $selected_tags))
                            <button type="button"
                                    class="list-group-item list-group-item-action"
                                    wire:click="addTag({{$tag}})" )>{{$tag->name}}</button>
                        @endif
                    @endforeach
                @elseif(strlen($query)>2)
                    <button type="button" class="list-group-item list-group-item-action" wire:click="storeTag" )>
                        Agregar nuevo tag...
                    </button>

                @endif
            </div>

            <div>
                @if(count($selected_tags)>0)
                    @foreach($selected_tags as $tag)
                        <div class="btn btn-sm btn-primary">
                            {{$tag['name']}}
                            <span class="badge badge-light" wire:click="removeTag({{json_encode($tag)}})">
                                <i class="fas fa-times"></i>
                            </span>
                        </div>
                        <input type="text" value="{{$tag['id']}}" name="tags[]" hidden>
                    @endforeach
                @endif
            </div>
        </x-slot>
    </x-adminlte-input>


</div>
