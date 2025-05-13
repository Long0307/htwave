<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TechnologyStatus;
use Illuminate\Auth\Access\HandlesAuthorization;

class TechnologyStatusPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the technologyStatus can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list technologystatuses');
    }

    /**
     * Determine whether the technologyStatus can view the model.
     */
    public function view(User $user, TechnologyStatus $model): bool
    {
        return $user->hasPermissionTo('view technologystatuses');
    }

    /**
     * Determine whether the technologyStatus can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create technologystatuses');
    }

    /**
     * Determine whether the technologyStatus can update the model.
     */
    public function update(User $user, TechnologyStatus $model): bool
    {
        return $user->hasPermissionTo('update technologystatuses');
    }

    /**
     * Determine whether the technologyStatus can delete the model.
     */
    public function delete(User $user, TechnologyStatus $model): bool
    {
        return $user->hasPermissionTo('delete technologystatuses');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete technologystatuses');
    }

    /**
     * Determine whether the technologyStatus can restore the model.
     */
    public function restore(User $user, TechnologyStatus $model): bool
    {
        return false;
    }

    /**
     * Determine whether the technologyStatus can permanently delete the model.
     */
    public function forceDelete(User $user, TechnologyStatus $model): bool
    {
        return false;
    }
}
