<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TechnologyCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class TechnologyCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the technologyCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list technologycategories');
    }

    /**
     * Determine whether the technologyCategory can view the model.
     */
    public function view(User $user, TechnologyCategory $model): bool
    {
        return $user->hasPermissionTo('view technologycategories');
    }

    /**
     * Determine whether the technologyCategory can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create technologycategories');
    }

    /**
     * Determine whether the technologyCategory can update the model.
     */
    public function update(User $user, TechnologyCategory $model): bool
    {
        return $user->hasPermissionTo('update technologycategories');
    }

    /**
     * Determine whether the technologyCategory can delete the model.
     */
    public function delete(User $user, TechnologyCategory $model): bool
    {
        return $user->hasPermissionTo('delete technologycategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete technologycategories');
    }

    /**
     * Determine whether the technologyCategory can restore the model.
     */
    public function restore(User $user, TechnologyCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the technologyCategory can permanently delete the model.
     */
    public function forceDelete(User $user, TechnologyCategory $model): bool
    {
        return false;
    }
}
