<?php

namespace App\Http\Livewire;

use App\Models\MenuItem;
use Livewire\Component;

class Menu extends Component
{
    public function render()
    {
        $menuItems = MenuItem::orderBy('order', 'ASC')->get();
        return view('livewire.menu', compact('menuItems'));
    }
}
