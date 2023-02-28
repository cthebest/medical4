<x-adminlte-modal id="openComponent" title="Componentes" size="lg" v-centered static-backdrop scrollable>
    @if ($components)
        <div class="accordion" id="accordionExample">
            @foreach ($components as $component)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ $component->label }}
                            </button>
                        </h2>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                        data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="list-group">
                                @foreach ($component->component_options as $option)
                                    <button type="button" href="#"
                                        class="list-group-item list-group-item-action" aria-current="true"
                                        wire:click="componentOptionChoosed({{ $option }})">
                                        {{ $option->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
    <x-slot name="footerSlot">
        <x-adminlte-button theme="danger" label="Cancelar" data-dismiss="modal" />
    </x-slot>
</x-adminlte-modal>