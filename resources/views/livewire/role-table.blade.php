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
                <th>Nombre</th>
                <th>Fecha de creación</th>
                <th>Fecha de actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td>{{ $role->created_at }}</td>
                    <td>{{ $role->updated_at }}</td>
                    <td>
                        @if (auth()->user()->hasRole('admin'))
                            <a href="{{ route('roles.edit', $role->id) }}" class="text-primary btn btn-light btn-sm shadow ">
                                <i class="fas fa-pen "></i>
                            </a>
                        @endif
                        @if (auth()->user()->hasRole('admin'))
                            <button class="text-primary btn btn-light btn-sm shadow "
                                wire:click="destroy({{ $role }})">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $roles->links() }}
</div>
