<div>
    @if (session('success'))
        <x-adminlte-alert theme="success" title="Success">
            {{ session('success') }}
        </x-adminlte-alert>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Alias</th>
                <th>Fecha de creación</th>
                <th>Fecha de actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menu_items as $menu_item)
                <tr>
                    <td>{{ $menu_item->id }}</td>
                    <td>{{ $menu_item->title }}</td>
                    <td>{{ $menu_item->alias }}</td>
                    <td>{{ $menu_item->created_at }}</td>
                    <td>{{ $menu_item->updated_at }}</td>
                    <td>
                        @can('update', $menu_item)
                            <a href="{{ route('menu-items.edit', $menu_item->id) }}"
                                class="text-primary btn btn-light btn-sm shadow ">
                                <i class="fas fa-pen "></i>
                            </a>
                        @endcan
                        @can('delete', $menu_item)
                            <button class="text-primary btn btn-light btn-sm shadow "
                                wire:click="destroy({{ $menu_item }})">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $menu_items->links() }}
</div>
