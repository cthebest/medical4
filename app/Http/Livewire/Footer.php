<?php

namespace App\Http\Livewire;

use App\Models\MenuItem;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {
        $menuItems = MenuItem::all();
        return view('livewire.footer', compact('menuItems'));
    }
}
