<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Notifications\DatabaseNotification;

class NotificationPolicy
{
    use HandlesAuthorization;
    
    public function update(User $user, DatabaseNotification $notification)
    {
        // dd($notification);
        return $user->id === $notification->notifiable_id;
    }
}
