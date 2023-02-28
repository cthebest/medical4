<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleTable extends Component
{
    use AuthorizesRequests;
    public function render()
    {
        $roles = Role::whereNot('name', 'admin')->paginate(12);
        return view('livewire.role-table', compact('roles'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Role $role): void
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }
        $role->delete();
        session()->flash('success', 'Role eliminado con éxito');
    }
}
