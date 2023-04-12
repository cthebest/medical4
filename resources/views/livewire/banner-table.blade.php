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
                <th>descripción</th>
                <th>Fecha de creación</th>
                <th>Fecha de actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->description }}</td>
                    <td>{{ $banner->created_at }}</td>
                    <td>{{ $banner->updated_at }}</td>
                    <td>
                        <a href="{{ route('banners.edit', $banner->id) }}"
                            class="text-primary btn btn-light btn-sm shadow ">
                            <i class="fas fa-pen "></i>
                        </a>
                        <button class="text-primary btn btn-light btn-sm shadow "
                            wire:click="destroy({{ $banner }})">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $banners->links() }}
</div>
