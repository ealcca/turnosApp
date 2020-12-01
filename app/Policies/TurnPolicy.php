<?php

namespace App\Policies;

use App\Models\Turn;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TurnPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Turn  $turn
     * @return mixed
     */
    public function view(User $user, Turn $turn)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'manager';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Turn  $turn
     * @return mixed
     */
    public function update(User $user, Turn $turn)
    {
        return $user->role == 'manager';
        //return $user->id === $turn->user->id;   //Solo puede actualizar la tarea el usuario que la creo o la tenga asignada
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Turn  $turn
     * @return mixed
     */
    public function delete(User $user, Turn $turn)
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Turn  $turn
     * @return mixed
     */
    public function restore(User $user, Turn $turn)
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Turn  $turn
     * @return mixed
     */
    public function forceDelete(User $user, Turn $turn)
    {
        return true;
    }
}
