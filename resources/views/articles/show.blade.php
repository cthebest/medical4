<x-web-layout>
    <x-slot:banner>
    </x-slot:banner>
    <div class="article">
        <div class="header">
            <h1>{{ $article->title }}</h1>
            <p>{{ $article->description }}</p>
        </div>
        <div class="body">
            <div class="header">
                <img src="{{ Storage::url($article->image) }}" alt="">
                <span>Por: {{ $article->user->name }}</span>
                <span>Actualizado {{ $article->updated_at->diffForHumans() }}</span>
            </div>
            <div class="content">
                {!! $article->body !!}
            </div>
        </div>
    </div>
</x-web-layout>
