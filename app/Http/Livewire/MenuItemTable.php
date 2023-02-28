<?php

namespace App\Http\Livewire;

use App\Models\MenuItem;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MenuItemTable extends Component
{
    use AuthorizesRequests;

    public function render()
    {
        $menu_items = MenuItem::paginate(12);
        return view('livewire.menu-item-table', compact('menu_items'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(MenuItem $menuItem): void
    {
        $this->authorize('delete', $menuItem);
        $menuItem->delete();
        session()->flash('success', 'Ítem de menú eliminado con éxito');
    }
}
