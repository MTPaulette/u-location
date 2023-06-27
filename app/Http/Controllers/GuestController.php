<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Info;
use App\Models\Post;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {
        return Inertia("Guest/index", [
            'posts' => Post::orderByDesc('created_at')
                                ->with('images')
                                ->get()
                                ->take(4)
        ]);
    }

    public function contact() {
        return Inertia("Guest/contact");
    }
    
    public function about() {
        return Inertia("Guest/about");
    }

    // public function notFound() {
    //     return Inertia("Guest/notFound");
    // }

    public function dashboard() {
        return Inertia("Dashboard/Home");
    }
}
