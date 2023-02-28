<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Facades\Gate;

class CategoryTable extends Component
{
    use AuthorizesRequests;

    public function render()
    {
        $categories = Category::paginate(12);
        return view('livewire.category-table', compact('categories'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Category $category): void
    {
        $this->authorize('delete', $category);
        $category->delete();
        session()->flash('success', 'Categoría eliminada con éxito');
    }
}
