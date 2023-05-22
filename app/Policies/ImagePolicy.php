<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Image;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    // give all permissions for admin
    public function before(?User $user, $ability)
    {
        if($user?->is_admin /*&& $ability == 'update' */) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */

    // put ? before the model for allow policy for unauthentificate or authentificate user
    public function viewAny(?User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, Image $image)
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Image $image)
    {
        //only the owner can update his image
        // return $user->id == $image->user_id;
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Image $image)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Image $image)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Image $image)
    {
        return false;
    }
}