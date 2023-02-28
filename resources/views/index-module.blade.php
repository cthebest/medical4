<div class="grid md:grid-cols-2 lg:grid-cols-3 sm:grid-cols-1 py-10 gap-2 w-5/6  container mx-auto">
    @foreach ($articles as $article)
        <x-articles.post-template title="{{ Str::limit($article->title, 100) }}"
                                  :category="$article->category"
                                  :description="Str::limit($article->description, 120)"
                                  date="{{ $article->updated_at->diffForHumans() }}"
                                  url="{{ to_url($article) }}"
                                  image="{{ $article->image }}"
                                  author="{{$article->user->name}}"
                                  :tags="$article->tags">
        </x-articles.post-template>
    @endforeach
</div>
