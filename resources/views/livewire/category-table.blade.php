<div>
    @if(session('success'))
        <x-adminlte-alert theme="success" title="Success">
            {{session('success')}}
        </x-adminlte-alert>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Alias</th>
            <th>Fecha de creación</th>
            <th>Fecha de actualización</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->alias}}</td>
                <td>{{$category->created_at}}</td>
                <td>{{$category->updated_at}}</td>
                <td>
                    <a href="{{route('categories.edit', $category->id)}}"
                       class="text-primary btn btn-light btn-sm shadow ">
                        <i class="fas fa-pen "></i>
                    </a>
                    <button class="text-primary btn btn-light btn-sm shadow " wire:click="destroy({{$category}})">
                        <i class="fas fa-trash text-danger"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {{$categories->links()}}
</div>
