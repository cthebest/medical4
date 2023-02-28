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
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        @if (auth()->user()->hasRole('admin'))
                            <a href="{{ route('users.edit', $user->id) }}"
                                class="text-primary btn btn-light btn-sm shadow ">
                                <i class="fas fa-pen "></i>
                            </a>
                        @endif
                        @if (auth()->user()->hasRole('admin') && !$user->hasRole('admin'))
                            <button class="text-primary btn btn-light btn-sm shadow "
                                wire:click="destroy({{ $user }})">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $users->links() }}
</div>
