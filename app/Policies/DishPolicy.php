<?php

namespace App\Policies;

use App\User;
use App\menu;
use Illuminate\Auth\Access\HandlesAuthorization;

class DishPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the menu.
     *
     * @param  \App\User  $user
     * @param  \App\menu  $menu
     * @return mixed
     */
    public function view(User $user, menu $menu)
    {
        //
    }

    /**
     * Determine whether the user can create menus.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the menu.
     *
     * @param  \App\User  $user
     * @param  \App\menu  $menu
     * @return mixed
     */
    public function update(User $user, menu $menu)
    {
        //
    }

    /**
     * Determine whether the user can delete the menu.
     *
     * @param  \App\User  $user
     * @param  \App\menu  $menu
     * @return mixed
     */
    public function delete(User $user, menu $menu)
    {
        //
    }
}
