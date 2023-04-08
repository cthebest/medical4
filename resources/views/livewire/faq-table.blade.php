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
                <th>Pregunta</th>
                <th>Fecha de creación</th>
                <th>Fecha de actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($faqs as $faq)
                <tr>
                    <td>{{ $faq->id }}</td>
                    <td>{{ $faq->question }}</td>
                    <td>{{ $faq->created_at }}</td>
                    <td>{{ $faq->updated_at }}</td>
                    <td>
                        <a href="{{ route('faqs.edit', $faq->id) }}" class="text-primary btn btn-light btn-sm shadow ">
                            <i class="fas fa-pen "></i>
                        </a>
                        <button class="text-primary btn btn-light btn-sm shadow "
                            wire:click="destroy({{ $faq }})">
                            <i class="fas fa-trash text-danger"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {{ $faqs->links() }}
</div>
