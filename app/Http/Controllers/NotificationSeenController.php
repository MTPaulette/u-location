<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;

class NotificationSeenController extends Controller
{
    public function __invoke(DatabaseNotification $notification)
    {
        // dd($notification);
        $this->authorize('update', $notification);
        $notification->markAsRead();
        return redirect('/notification')->with('success', 'Notification marked as read');
        // return redirect()->back()->with('success', 'Notification marked as read');
    }
}
