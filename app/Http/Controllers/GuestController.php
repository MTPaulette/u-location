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
            'informations' =>  Info::find(1),
            'categories' => Category::orderBy('name', 'asc')->get(),
            'posts' => Post::orderByDesc('created_at')
                                ->with('images')
                                ->get()
                                ->take(4)
        ]);
    }

    public function contact() {
        return Inertia("Guest/contact", [
            'informations' =>  Info::find(1),
        ]);
    }
    
    public function about() {
        return Inertia("Guest/about", [
            'informations' =>  Info::find(1),
        ]);
    }

    public function notFound() {
        return Inertia("Guest/notFound", [
            'informations' =>  Info::find(1),
        ]);
    }

    public function dashboard() {
        return Inertia("Dashboard/Home");
    }
}
