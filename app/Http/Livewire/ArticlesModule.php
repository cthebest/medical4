<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;

class ArticlesModule extends Component
{
    public function render()
    {
        $articles = Article::whereDoesntHave('category', function (Builder $query) {
            $query->where('alias', 'servicios');
        })->take(3)->get();
        return view('livewire.articles-module', compact('articles'));
    }
}
