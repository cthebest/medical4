<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class Services extends Component
{
    public function render()
    {
        $services = Category::with('articles')->whereAlias('servicios')->first();
        $articles = $services?->articles;
        return view('livewire.services', compact('articles'));
    }
}
