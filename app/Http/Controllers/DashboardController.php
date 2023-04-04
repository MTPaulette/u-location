<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home() {
        return Inertia("Dashboard/Home");
    }
    
    function statistic() {
        return Inertia("Dashboard/Statistic");
    }

    function notification() {
        return Inertia("Dashboard/Notification", [
            'posts' => Post::orderByDesc('created_at')
                    ->paginate(5)
        ]);
    }

    function invoice() {
        return Inertia("Dashboard/Invoice", [
            'posts' => Post::orderByDesc('created_at')
                    ->paginate(5)
        ]);
    }
}
