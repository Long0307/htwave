<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Inquiry;
use Illuminate\Auth\Access\HandlesAuthorization;

class InquiryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the inquiry can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list inquiries');
    }

    /**
     * Determine whether the inquiry can view the model.
     */
    public function view(User $user, Inquiry $model): bool
    {
        return $user->hasPermissionTo('view inquiries');
    }

    /**
     * Determine whether the inquiry can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create inquiries');
    }

    /**
     * Determine whether the inquiry can update the model.
     */
    public function update(User $user, Inquiry $model): bool
    {
        return $user->hasPermissionTo('update inquiries');
    }

    /**
     * Determine whether the inquiry can delete the model.
     */
    public function delete(User $user, Inquiry $model): bool
    {
        return $user->hasPermissionTo('delete inquiries');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete inquiries');
    }

    /**
     * Determine whether the inquiry can restore the model.
     */
    public function restore(User $user, Inquiry $model): bool
    {
        return false;
    }

    /**
     * Determine whether the inquiry can permanently delete the model.
     */
    public function forceDelete(User $user, Inquiry $model): bool
    {
        return false;
    }
}
