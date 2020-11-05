<?php

namespace App\Policies;

use App\User;
use App\Intro;
use Illuminate\Auth\Access\HandlesAuthorization;

class IntroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any intros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->CheckPermissionAccess('list-intro');
    }

    /**
     * Determine whether the user can view the intro.
     *
     * @param  \App\User  $user
     * @param  \App\Intro  $intro
     * @return mixed
     */
    public function view(User $user, Intro $intro)
    {
        //
    }

    /**
     * Determine whether the user can create intros.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->CheckPermissionAccess('add-intro');
    }

    /**
     * Determine whether the user can update the intro.
     *
     * @param  \App\User  $user
     * @param  \App\Intro  $intro
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->CheckPermissionAccess('edit-intro');
    }

    /**
     * Determine whether the user can delete the intro.
     *
     * @param  \App\User  $user
     * @param  \App\Intro  $intro
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->CheckPermissionAccess('delete-intro');
    }

    /**
     * Determine whether the user can restore the intro.
     *
     * @param  \App\User  $user
     * @param  \App\Intro  $intro
     * @return mixed
     */
    public function restore(User $user, Intro $intro)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the intro.
     *
     * @param  \App\User  $user
     * @param  \App\Intro  $intro
     * @return mixed
     */
    public function forceDelete(User $user, Intro $intro)
    {
        //
    }
}
