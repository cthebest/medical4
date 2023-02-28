<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserTable extends Component
{
    public function render()
    {
        $users = User::with('roles')->whereNot('id', auth()->user()->id)->paginate(12);
        return view('livewire.user-table', compact('users'));
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(User $user): void
    {
        if (!auth()->user()->hasRole('admin')) {
            abort(403);
        }
        $user->delete();
        session()->flash('success', 'Usuario eliminado con éxito');
    }
}
