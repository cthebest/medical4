<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Collection;
use Livewire\Component;

class ChooseArticleByCategory extends Component
{
    public $query;
    public $resource_id;
    public Collection $categories;
    public $title;

    public function mount($resource_id)
    {
        if ($resource_id) {
            $category = Category::findOrFail($resource_id);
            $this->title = $category->name;
        }
    }

    public function render()
    {
        if ($this->query > 2)
            $this->categories = Category::where('name', 'LIKE', "%$this->query%")->get();
        return view('livewire.choose-article-by-category');
    }

    public function addCategory($resource)
    {
        $this->resource_id = $resource['id'];
        $this->categories = new Collection();
        $this->query = '';
        $this->title = $resource['name'];
    }
}
