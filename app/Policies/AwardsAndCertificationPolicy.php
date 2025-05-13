<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AwardsAndCertification;
use Illuminate\Auth\Access\HandlesAuthorization;

class AwardsAndCertificationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the awardsAndCertification can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list awardsandcertifications');
    }

    /**
     * Determine whether the awardsAndCertification can view the model.
     */
    public function view(User $user, AwardsAndCertification $model): bool
    {
        return $user->hasPermissionTo('view awardsandcertifications');
    }

    /**
     * Determine whether the awardsAndCertification can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create awardsandcertifications');
    }

    /**
     * Determine whether the awardsAndCertification can update the model.
     */
    public function update(User $user, AwardsAndCertification $model): bool
    {
        return $user->hasPermissionTo('update awardsandcertifications');
    }

    /**
     * Determine whether the awardsAndCertification can delete the model.
     */
    public function delete(User $user, AwardsAndCertification $model): bool
    {
        return $user->hasPermissionTo('delete awardsandcertifications');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete awardsandcertifications');
    }

    /**
     * Determine whether the awardsAndCertification can restore the model.
     */
    public function restore(User $user, AwardsAndCertification $model): bool
    {
        return false;
    }

    /**
     * Determine whether the awardsAndCertification can permanently delete the model.
     */
    public function forceDelete(User $user, AwardsAndCertification $model): bool
    {
        return false;
    }
}
