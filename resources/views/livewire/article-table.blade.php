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
            <th>Título</th>
            <th>Alias</th>
            <th>Estado</th>
            <th>Autor</th>
            <th>Fecha de creación</th>
            <th>Fecha de actualización</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{$article->id}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->alias}}</td>
                <td>{{trans('adminlte::adminlte.'.$article->status)}}</td>
                <td>{{$article->user->name}}</td>
                <td>{{$article->created_at}}</td>
                <td>{{$article->updated_at}}</td>
                <td>
                    @can('update', $article)
                        <a href="{{route('articles.edit', $article->id)}}"
                           class="text-primary btn btn-light btn-sm shadow ">
                            <i class="fas fa-pen "></i>
                        </a>
                    @endcan
                    @can('delete', $article)
                        <button class="text-primary btn btn-light btn-sm shadow " wire:click="destroy({{$article}})">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {{$articles->links()}}
</div>
