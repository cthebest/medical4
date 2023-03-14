<div class="content" style="margin: 1rem;">
    @foreach ($articles as $article)
        <x-articles.post-template title="{{ Str::limit($article->title, 100) }}" :category="$article->category" :description="Str::limit($article->description, 120)"
            date="{{ $article->updated_at->diffForHumans() }}" url="{{ to_url($article) }}" image="{{ $article->image }}"
            author="{{ $article->user->name }}" :tags="$article->tags">
        </x-articles.post-template>
    @endforeach
</div>
