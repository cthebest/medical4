<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ArticleTable extends Component
{
    use AuthorizesRequests;


    public function render()
    {
        $articles = Article::paginate(12);
        return view('livewire.article-table', compact('articles'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Article $article): void
    {
        $this->authorize('delete', $article);
        $article->delete();
        session()->flash('success', 'Artículo eliminado con éxito');
    }
}
