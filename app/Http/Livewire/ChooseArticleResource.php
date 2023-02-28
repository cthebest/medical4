<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Illuminate\Support\Collection;
use Livewire\Component;

class ChooseArticleResource extends Component
{
    public $query;
    public $resource_id;
    public Collection $articles;
    public $title;

    public function mount($resource_id)
    {
        if ($resource_id) {
            $article = Article::findOrFail($resource_id);
            $this->title = $article->title;
        }
    }
    public function render()
    {
        if ($this->query > 2)
            $this->articles = Article::where('title', 'LIKE', "%$this->query%")->get();
        return view('livewire.choose-article-resource');
    }

    public function addArticle($resource)
    {
        $this->resource_id = $resource['id'];
        $this->articles = new Collection();
        $this->query = '';
        $this->title = $resource['title'];
    }
}
