<?php

namespace App\Policies;

use App\Models\MenuItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, MenuItem $menuItem)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $this->isAdmin($user) || $user->can('create_menu_items');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, MenuItem $menuItem)
    {
        return $this->isAdmin($user) || $user->can('update_menu_items');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, MenuItem $menuItem)
    {
        return $this->isAdmin($user) || $user->can('delete_menu_items');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, MenuItem $menuItem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\MenuItem  $menuItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, MenuItem $menuItem)
    {
        //
    }

    private function isAdmin(User $user): bool
    {
        return $user->hasRole('admin');
    }
}
