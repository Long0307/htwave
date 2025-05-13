<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Solution;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolutionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the solution can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list solutions');
    }

    /**
     * Determine whether the solution can view the model.
     */
    public function view(User $user, Solution $model): bool
    {
        return $user->hasPermissionTo('view solutions');
    }

    /**
     * Determine whether the solution can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create solutions');
    }

    /**
     * Determine whether the solution can update the model.
     */
    public function update(User $user, Solution $model): bool
    {
        return $user->hasPermissionTo('update solutions');
    }

    /**
     * Determine whether the solution can delete the model.
     */
    public function delete(User $user, Solution $model): bool
    {
        return $user->hasPermissionTo('delete solutions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete solutions');
    }

    /**
     * Determine whether the solution can restore the model.
     */
    public function restore(User $user, Solution $model): bool
    {
        return false;
    }

    /**
     * Determine whether the solution can permanently delete the model.
     */
    public function forceDelete(User $user, Solution $model): bool
    {
        return false;
    }
}
